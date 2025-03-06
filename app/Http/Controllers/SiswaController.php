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
        $quizId = $course->id;
        $attempts = UserQuiz::where('user_id', auth()->id())->where('quiz_id', $quizId)->count();
        return view('Student.detail', compact('course','attempts'));
    }

    public function leaderboard($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        
        $leaderboard = UserQuiz::where('quiz_id', $quizId)
        ->join('users', 'user_quizzes.user_id', '=', 'users.id')
        ->select('users.name', 'user_quizzes.score', 'user_quizzes.created_at')
        ->orderByDesc('user_quizzes.score')
        ->paginate(10);

        return view('Student.leaderboard', compact('quiz', 'leaderboard'));
    }

    public function quiz()
    {
        $userEmail = auth()->user()->email;

        // Hanya menampilkan quiz private yang mengandung email siswa
        $courses = Quiz::where('is_private', false)
        ->where('user_emails', 'LIKE', "%$userEmail%")
        ->get(); // Mengambil banyak data (Collection)

        $attempts = [];

        foreach ($courses as $course) {
            $attempts[$course->id] = UserQuiz::where('user_id', auth()->id())
                                            ->where('quiz_id', $course->id)
                                            ->count();
        }
        return view('Student.quizzes', compact('courses','attempts'));
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
        
        $quizId = $quiz->id;
        $attempts = UserQuiz::where('user_id', auth()->id())->where('quiz_id', $quizId)->count();
        if ($attempts >= 3) {
            return redirect()->back()->with('error', 'Anda sudah mencapai batas percobaan! ('.$attempts.'/3).');
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
        $correct = 0;
        $results = [];
    
        // Hitung skor per pertanyaan
        $totalQuestions = $quiz->question->count();
        $scorePerQuestion = 100 / $totalQuestions; // Skor maksimum 100
    
        // Loop melalui setiap pertanyaan untuk mengevaluasi jawaban
        foreach ($quiz->question as $question) {
            $correctAnswer = $question->answer->where('is_correct', true)->first();
            $userAnswer = $userAnswers[$question->id] ?? null;
            $isCorrect = $userAnswer && $userAnswer == $correctAnswer->id;
    
            // Tambahkan ke array hasil
            $results[] = [
                'question' => $question->question,
                'user_answer' => $question->answer->find($userAnswer)->answer ?? 'No Answer',
                'correct_answer' => $correctAnswer->answer,
                'is_correct' => $isCorrect,
            ];
    
            if ($isCorrect) {
                $correct++;
            }
        }
    
        // Hitung skor total
        $score = $correct * $scorePerQuestion;
    
        // Tentukan apakah siswa lulus atau tidak
        $status = $score >= 80 ? 'Passed' : 'Failed';
    
        // Simpan hasil ke database
        UserQuiz::create([
            'quiz_id' => $quiz->id,
            'user_id' => auth()->id(),
            'correct' => $correct,
            'score' => $score,
            'status' => $status,
        ]);
    
        // Hapus sesi setelah selesai
        session()->forget("quiz_{$quiz->id}_answers");
    
        return view('Student.result', compact('quiz', 'results', 'correct', 'score', 'status'));
    }

    public function finished() {
        // Ambil kuis berdasarkan slug
        $quiz = Quiz::with('question')->firstOrFail();
        $results = auth()->user()->userQuiz()->with('quiz')->get();
        return view('Student.finished', compact('results','quiz'));
    }

}
