<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\UserQuiz;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index() {
        $newestCourses = Quiz::where('is_private', true)->latest()->paginate(6);

        return view('Student.dashboard', compact('newestCourses'));
    }

    public function detail($slug) {
        $course = Quiz::where('slug', $slug)->with(['question','user'])->firstOrFail();
        return view('Student.detail', compact('course'));
    }

    public function quiz()
    {
        $userEmail = auth()->user()->email;

        // Hanya menampilkan quiz private yang mengandung email siswa
        $courses = Quiz::where('is_private', false)
                    ->where('user_emails', 'LIKE', "%$userEmail%")
                    ->get();

        return view('Student.quizzes', compact('courses'));
    }

    public function question($slug, $index) {
        $quiz = Quiz::where('slug', $slug)->with('question.answer')->firstOrFail();
        $questions = $quiz->question;

        if (!$quiz || empty($questions->count())) {
            return redirect()->back()->withErrors(['question' => 'Quiz Atau Pertanyaan Belum Tersedia!']); // Quiz tidak ditemukan
        }

        if ($quiz->is_private == false && !in_array(auth()->user()->email, $quiz->user_emails ?? [])) {
            abort(403, 'Anda tidak diizinkan mengakses quiz ini'); // Akses ditolak
        }
        

        // Pastikan indeks valid
        if ($index < 1 || $index > $questions->count()) {
            return redirect()->route('quiz.result', $slug);
        }

        $currentQuestion = $questions[$index - 1];

        return view('Student.startQuiz', compact('quiz', 'currentQuestion', 'index', 'questions'));
    }

    public function answer(Request $request, $slug)
    {
        $quiz = Quiz::where('slug', $slug)->firstOrFail();
        $questionId = $request->input('question_id');
        $answerId = $request->input('answer_id');

        // Simpan jawaban ke session
        $userAnswers = session()->get("quiz_{$quiz->id}_answers", []);
        $userAnswers[$questionId] = $answerId;
        session()->put("quiz_{$quiz->id}_answers", $userAnswers);

        // Arahkan ke pertanyaan berikutnya
        $nextIndex = $request->input('current_index') + 1;
        return redirect()->route('quiz.question', ['slug' => $slug, 'index' => $nextIndex]);
    }

    public function result($slug)
    {
        $quiz = Quiz::where('slug', $slug)->with('question.answer')->firstOrFail();
        $userAnswers = session()->get("quiz_{$quiz->id}_answers", []);

        // Cek apakah hasil sudah ada untuk user ini
        $existingResult = UserQuiz::where('quiz_id', $quiz->id)
            ->where('user_id', auth()->id())
            ->first();

        // Jika sudah ada, gunakan nilai yang sudah disimpan
        if ($existingResult) {
            $score = $existingResult->score;
            $correct = $existingResult->correct;
            $status = $existingResult->status;
        } else {
            $correct = 0;
            $totalQuestions = $quiz->question->count();
            $scorePerQuestion = 100 / $totalQuestions;

            foreach ($quiz->question as $question) {
                $correctAnswer = $question->answer->where('is_correct', true)->first();
                $userAnswer = $userAnswers[$question->id] ?? null;
                $isCorrect = $userAnswer && $userAnswer == $correctAnswer->id;

                if ($isCorrect) {
                    $correct++;
                }
            }

            $score = $correct * $scorePerQuestion;
            $status = $score >= 80 ? 'Passed' : 'Failed';

            // Simpan hasil ke database jika belum ada
            UserQuiz::create([
                'quiz_id' => $quiz->id,
                'user_id' => auth()->id(),
                'correct' => $correct,
                'score' => $score,
                'status' => $status,
            ]);

            session()->forget("quiz_{$quiz->id}_answers");
        }

        // Buat ulang array results untuk tampilan
        $results = [];
        foreach ($quiz->question as $question) {
            $correctAnswer = $question->answer->where('is_correct', true)->first();
            $userAnswer = $userAnswers[$question->id] ?? null;

            $results[] = [
                'question' => $question->question,
                'user_answer' => $question->answer->find($userAnswer)->answer ?? 'No Answer',
                'correct_answer' => $correctAnswer->answer,
                'is_correct' => $userAnswer && $userAnswer == $correctAnswer->id,
            ];
        }

        return view('Student.result', compact('quiz', 'results', 'correct', 'score', 'status'));
    }

    public function finished() {
        // Ambil kuis berdasarkan slug
        $quiz = Quiz::with('question')->firstOrFail();
        $results = auth()->user()->userQuiz()->with('quiz')->get();
        return view('Student.finished', compact('results','quiz'));
    }

}
