<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Question;
use App\Models\UserQuiz;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index() {
        $user = Auth::user();
        $quizCount = $user->quiz->count();
        // Ambil quiz yang dimiliki oleh user saat ini
        $quizzes = Quiz::with('question') // Eager load untuk mengurangi query
            ->where('user_id', $user->id)
            ->latest() // Urutkan berdasarkan yang terbaru
            ->paginate(3); // Batasi tampilan ke 3 quiz terbaru;

        return view('Teacher.dashboard', compact('user','quizCount','quizzes'));
    }

    public function resultQuiz($slug, Request $request)
    {
        // Ambil kuis berdasarkan slug
        $quiz = Quiz::where('slug', $slug)->with('question')->firstOrFail();

        // Ambil parameter sorting dari request (default: terbaru)
        $sort = $request->get('sort', 'latest');

        // Query hasil kuis
        $resultsQuery = UserQuiz::where('quiz_id', $quiz->id)->with('user');

        // Sorting berdasarkan pilihan
        switch ($sort) {
            case 'lowest_score':
                $resultsQuery->orderBy('score', 'asc');
                break;
            case 'highest_score':
                $resultsQuery->orderBy('score', 'desc');
                break;
            case 'oldest':
                $resultsQuery->orderBy('created_at', 'asc');
                break;
            default: // latest
                $resultsQuery->orderBy('created_at', 'desc');
                break;
        }

        // Eksekusi query
        $results = $resultsQuery->paginate(10);

        // Kirim ke view
        return view('Teacher.result', compact('results', 'quiz', 'sort'));
    }

    public function deleteResult($resultId)
    {
        $result = UserQuiz::findOrFail($resultId);
        $result->delete();
        
        return back()->with('success', 'Quiz result deleted successfully.');
    }

    public function deleteAllResult($quizId)
    {
        UserQuiz::where('quiz_id', $quizId)->delete();
        
        return back()->with('success', 'All quiz results deleted successfully.');
    }

    //QUIZ

    public function showQuiz() {
        $courses = Quiz::where('user_id', Auth::id())->paginate(10);
        return view('Teacher.quiz.show', compact('courses'));
    }

    public function createQuiz() {
        return view('Teacher.quiz.tambah');
    }

    public function storeQuiz(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:quizzes,title',
            'description' => 'string|nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_private' => 'required|boolean',
        ]);
       

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('quiz', 'public');
        } else {
            $imagePath = null; // jika gambar tidak diupload
        }

        // Simpan data kursus
        Quiz::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'description' => $validated['description'],
            'image' => $imagePath,
            'user_id' => Auth::id(),
            'is_private' => $validated['is_private'],
        ]);

        return redirect()->route('guru.quiz')->with('success', 'Quiz created successfully.');
    }
    
    public function editQuiz($id) {
        $quiz = Quiz::findOrFail($id);

        return view('Teacher.quiz.edit', compact('quiz'));
    }

    public function updateQuiz(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|nullable',
            'is_private' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $quiz = Quiz::findOrFail($id);
    
        // Update data
        $quiz->title = $request->title;
        $quiz->slug = Str::slug($request->title);
        $quiz->description = $request->description;
        $quiz->is_private = $request->is_private;
    
        // Cek jika ada file gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($quiz->image && Storage::exists($quiz->image)) {
                Storage::delete($quiz->image);
            }
    
            // Simpan gambar baru
            $path = $request->file('image')->store('public/quiz');
            $quiz->image = $path;
        }
    
        $quiz->save();
    
        return redirect()->route('guru.quiz')->with('success', 'Quiz updated successfully.');
    }

    public function deleteQuiz($id) {
        $quiz = Quiz::findOrFail($id);
    
        // Hapus entri terkait di tabel user_quizzes
        $quiz->userQuiz()->delete();
    
        // Hapus gambar terkait jika ada
        if ($quiz->image && Storage::exists($quiz->image)) {
            Storage::delete($quiz->image);
        }
    
        // Hapus semua jawaban untuk setiap pertanyaan dalam quiz
        foreach ($quiz->question as $question) {
            $question->answer()->delete();
        }
    
        // Hapus semua pertanyaan terkait
        $quiz->question()->delete();
    
        // Hapus quiz itu sendiri
        $quiz->delete();
    
        return redirect()->back()->with('success', 'Quiz deleted successfully.');
    }    
    
    //STUDENTS

    public function showStudent($slug)
    {
        $course = Quiz::where('slug', $slug)->with('userQuiz')->firstOrFail();
    
        // Tangani null atau kosong
        $userEmails = $course->user_emails ? (is_string($course->user_emails) ? explode(',', $course->user_emails) : $course->user_emails) : [];
    
        $students = !empty($userEmails)
        ? User::whereIn('email', $userEmails)->with(['userQuiz' => function ($query) use ($course) {
            $query->where('quiz_id', $course->id);
        }])->get()
        : collect();

        return view('Teacher.students.show', compact('course', 'students'));
    }    

    public function createStudent($slug) {
        $course = Quiz::where('slug', $slug)->firstOrFail();
        return view('Teacher.students.tambah', compact('course'));
    }

    public function storeStudent(Request $request, $quizId)
    {
        $quiz = Quiz::findOrFail($quizId);

        // Validasi email siswa
        $validated = $request->validate([
            'emails' => 'required|array',
            'emails.*' => [
                'email',
                function ($attribute, $value, $fail) {
                    // Pastikan email ada di tabel users dengan role siswa
                    $user = User::where('email', $value)->where('role_id', '1')->first();
                    if (!$user) {
                        $fail('Email ' . $value . ' tidak valid atau bukan siswa.');
                    }
                },
            ],
        ]);

        // Dapatkan email yang sudah ada di quiz
        $existingEmails = $quiz->user_emails ?? [];

        // Filter email baru yang belum ada di daftar
        $newEmails = array_filter($validated['emails'], function ($email) use ($existingEmails) {
            return !in_array($email, $existingEmails);
        });

        // Jika tidak ada email baru untuk ditambahkan, kembalikan pesan kesalahan
        if (empty($newEmails)) {
            return redirect()->back()->withErrors(['emails' => 'Siswa dengan Email yang ditambahkan sudah bergabung di quiz.']);
        }

        // Tambahkan email baru ke quiz
        $quiz->user_emails = array_merge($existingEmails, $newEmails);
        $quiz->save();

        return redirect()->route('show.siswa', $quiz->slug)->with('success', 'Berhasil Menambah Siswa Baru!');
    }

    public function deleteStudent(Request $request, $quizId)
    {
        $quiz = Quiz::findOrFail($quizId);

        // Validasi email yang akan dihapus
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        $emailToRemove = $validated['email'];

        // Dapatkan array email saat ini
        $existingEmails = $quiz->user_emails ?? [];

        // Periksa apakah email ada dalam array
        if (!in_array($emailToRemove, $existingEmails)) {
            return redirect()->back()->withErrors(['email' => 'Email tidak ditemukan di dalam quiz.']);
        }

        // Hapus email dari array
        $updatedEmails = array_filter($existingEmails, function ($email) use ($emailToRemove) {
            return $email !== $emailToRemove;
        });

        // Perbarui database
        $quiz->user_emails = $updatedEmails;
        $quiz->save();

        return redirect()->route('show.siswa', $quiz->slug)->with('success', 'Siswa berhasil dihapus dari quiz.');
    }

}
