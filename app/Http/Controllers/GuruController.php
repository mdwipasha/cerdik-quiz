<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index() {
        $user = Auth::user();
        $quizCount = $user->quiz->count();

        return view('Teacher.dashboard', compact('user','quizCount'));
    }

    //QUIZ

    public function showQuiz() {
        $courses = Quiz::where('user_id', Auth::id())->get();
        return view('Teacher.quiz.show', compact('courses'));
    }

    public function createQuiz() {
        return view('Teacher.quiz.tambah');
    }

    public function storeQuiz(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:quizzes,title',
            'description' => 'gurustring|max:255',
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

        return redirect()->route('guru.courses')->with('success', 'Course created successfully.');
    }
    
    public function editQuiz($id) {
        $quiz = Quiz::findOrFail($id);

        return view('Teacher.quiz.edit', compact('quiz'));
    }

    public function updateQuiz(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
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
    
        return redirect()->route('guru.courses')->with('success', 'Course updated successfully.');
    }

    public function deleteQuiz($id) {
        $quiz = Quiz::findOrFail($id);
    
        // Check if the quiz has an associated image and delete it
        if ($quiz->image && Storage::exists($quiz->image)) {
            Storage::delete($quiz->image);
        }
    
        // Delete all associated answers for each question in the quiz
        foreach ($quiz->question as $question) {
            $question->answer()->delete();
        }
    
        // Delete all associated questions
        $quiz->question()->delete();
    
        // Delete the quiz itself
        $quiz->delete();
    
        return redirect()->back()->with('success', 'Quiz deleted successfully.');
    }
    

    //STUDENTS

    public function showStudent($slug) {
        $course = Quiz::where('slug', $slug)->firstOrFail();
        return view('Teacher.students.show', compact('course'));
    }

    public function createStudent($slug) {
        $course = Quiz::where('slug', $slug)->firstOrFail();
        return view('Teacher.students.tambah', compact('course'));
    }

    public function storeStudent(Request $request, $quizId)
    {
        $quiz = Quiz::find($quizId);

        // Validasi email siswa
        $validated = $request->validate([
            'emails' => 'required|array',
            'emails.*' => 'email|exists:users,email', // Pastikan email ada di database
        ]);

        // Tambahkan email siswa ke quiz
        $quiz->user_emails = array_merge($quiz->user_emails ?? [], $validated['emails']);
        $quiz->save();

        return redirect()->route('show.siswa', $quiz->slug)->with('success','Berhasil Menambah Siswa!');
    }

}
