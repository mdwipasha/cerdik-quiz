<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function showQuestion($slug) {
        $course = Quiz::where('slug', $slug)->with('question')->firstOrFail();
        return view('Teacher.questions.show', compact('course'));
    }

    public function createQuestion($slug) {
        $course = Quiz::where('slug', $slug)->firstOrFail();
        return view('Teacher.questions.tambah', compact('course'));
    }

    public function storeQuestion(Request $request) {
        $request->validate([
            'question' => 'required|string|max:255',
            'answers' => 'required|array|min:4',
            'answers.*' => 'required|string|max:255',
            'correct_answer' => 'required|integer|between:1,4',
        ]);

        // Save the question
        $question = Question::create([
            'question' => $request->question,
            'quiz_id' => $request->quiz_id, // Assume course_id is passed in the form
        ]);

        // Save the answers
        foreach ($request->answers as $index => $answer) {
            $question->answer()->create([
                'answer' => $answer,
                'is_correct' => $index + 1 == $request->correct_answer,
            ]);
        }

        $slug = $request->input('slug');

        return redirect()->route('detail.quiz', ['slug' => $slug])
                ->with('success', 'Question added successfully!');
    }

    public function editQuestion($id) {
        $question = Question::with('answer')->findOrFail($id);
        
        return view('Teacher.questions.edit', compact('question'));
    }

    public function updateQuestion(Request $request, $id) {
        // Temukan pertanyaan berdasarkan ID
        $question = Question::findOrFail($id);
    
        // Ambil quiz yang terkait dengan pertanyaan
        $quiz = $question->quiz;
    
        // Validasi data yang diterima
        $request->validate([
            'question' => 'required|string|max:255',
            'answers' => 'required|array|min:2',
            'answers.*' => 'required|string|max:255',
            'correct_answer' => 'required|exists:answers,id',
        ]);
    
        // Update pertanyaan
        $question->update([
            'question' => $request->input('question'),
        ]);
    
        // Update jawaban
        foreach ($request->input('answers') as $answerId => $answerText) {
            $answer = Answer::findOrFail($answerId);
            $answer->update([
                'answer' => $answerText,
                'is_correct' => $request->input('correct_answer') == $answerId ? 1 : 0,
            ]);
        }
    
        // Redirect ke halaman detail quiz berdasarkan slug
        return redirect()->route('detail.quiz', $quiz->slug)
                         ->with('success', 'Question updated successfully.');
    }
    

    public function deleteQuestion($id) {
        $question = Question::findOrFail($id);

        // Delete all associated answers
        $question->answer()->delete();

        // Delete the question
        $question->delete();

        return redirect()->back()->with('success', 'Question deleted successfully.');
    }
}
