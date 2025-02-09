<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/student/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
    Route::get('/student/dashboard/detail/{slug}', [SiswaController::class, 'detail'])->name('siswa.detail.quiz');
    Route::get('/student/quiz', [SiswaController::class, 'quiz'])->name('quiz.siswa');
    Route::get('/student/quiz/{slug}/{index}', [SiswaController::class, 'question'])->name('quiz.question');
    Route::post('/student/quiz/{slug}', [SiswaController::class, 'answer'])->name('quiz.answer');
    Route::get('/student/courses/{slug}/result', [SiswaController::class, 'result'])->name('quiz.result');
    Route::get('/student/quiz/finished', [SiswaController::class, 'finished'])->name('quiz.finished');
    Route::get('/student/{quizId}/leaderboard', [SiswaController::class, 'leaderboard'])->name('quiz.leaderboard');
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/teacher/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');

    //QUIZ
    Route::get('/teacher/quiz', [GuruController::class, 'showQuiz'])->name('guru.quiz');
    Route::get('/teacher/quiz/create', [GuruController::class, 'createQuiz'])->name('create.quiz');
    Route::post('/teacher/quiz/store', [GuruController::class, 'storeQuiz'])->name('store.quiz');
    Route::get('/teacher/quiz/{id}/edit', [GuruController::class, 'editQuiz'])->name('edit.quiz');
    Route::post('/teacher/quiz/{id}', [GuruController::class, 'updateQuiz'])->name('update.quiz');
    Route::delete('/teacher/quiz/{id}', [GuruController::class, 'deleteQuiz'])->name('delete.quiz');
    Route::get('/teacher/quiz/{slug}/result', [GuruController::class, 'resultQuiz'])->name('result.quiz');
    
    //QUESTIONS
    Route::get('/teacher/quiz/detail/{slug}', [QuizController::class, 'showQuestion'])->name('detail.quiz');
    Route::get('/teacher/quiz/detail/question/{slug}/create', [QuizController::class, 'createQuestion'])->name('create.question');
    Route::post('/teacher/quiz/detail/question', [QuizController::class, 'storeQuestion'])->name('store.question');
    Route::get('/teacher/quiz/detail/questions/{id}/edit', [QuizController::class, 'editQuestion'])->name('edit.question');
    Route::put('/teacher/quiz/detail/questions/{id}', [QuizController::class, 'updateQuestion'])->name('update.question');
    Route::delete('/teacher/quiz/detail/questions/{id}', [QuizController::class, 'deleteQuestion'])->name('delete.question');

    //STUDENTS
    Route::get('/teacher/quiz/detail/student/{slug}/show', [GuruController::class, 'showStudent'])->name('show.siswa');
    Route::get('/teacher/quiz/detail/student/{slug}', [GuruController::class, 'createStudent'])->name('create.siswa');
    Route::post('/teacher/quiz/detail/student/{id}/store', [GuruController::class, 'storeStudent'])->name('store.siswa');
    Route::delete('/teacher/quiz/detail/student/{id}', [GuruController::class, 'deleteStudent'])->name('delete.siswa');
});

require __DIR__.'/auth.php';
