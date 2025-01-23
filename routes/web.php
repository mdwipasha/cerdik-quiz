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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/student/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
    Route::get('/student/dashboard/detail/{slug}', [SiswaController::class, 'detail'])->name('siswa.detail.courses');
    Route::get('/student/courses', [SiswaController::class, 'courses'])->name('siswa.course');
    Route::get('/student/courses/{slug}/question/{index}', [SiswaController::class, 'question'])->name('quiz.question');
    Route::post('/student/courses/{slug}/answer', [SiswaController::class, 'answer'])->name('quiz.answer');
    Route::get('/student/courses/finished', [SiswaController::class, 'finished'])->name('quiz.finished');
    Route::get('/student/courses/{slug}/result', [SiswaController::class, 'result'])->name('quiz.result');
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/teacher/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');

    //QUIZ
    Route::get('/teacher/courses', [GuruController::class, 'showQuiz'])->name('guru.courses');
    Route::get('/teacher/courses/create', [GuruController::class, 'createQuiz'])->name('create.courses');
    Route::post('/teacher/courses/store', [GuruController::class, 'storeQuiz'])->name('store.courses');
    Route::get('/teacher/courses/{id}/edit', [GuruController::class, 'editQuiz'])->name('edit.quiz');
    Route::post('/teacher/courses/{id}', [GuruController::class, 'updateQuiz'])->name('update.quiz');
    Route::delete('/teacher/courses/{id}', [GuruController::class, 'deleteQuiz'])->name('delete.quiz');
    Route::get('/teacher/courses/{slug}/result', [GuruController::class, 'resultQuiz'])->name('result.courses');
    
    //QUESTIONS
    Route::get('/teacher/courses/detail/{slug}', [QuizController::class, 'showQuestion'])->name('detail.courses');
    Route::get('/teacher/courses/detail/question/{slug}/create', [QuizController::class, 'createQuestion'])->name('question.courses');
    Route::post('/teacher/courses/detail/question', [QuizController::class, 'storeQuestion'])->name('store.question');
    Route::get('/teacher/courses/detail/questions/{id}/edit', [QuizController::class, 'editQuestion'])->name('edit.question');
    Route::put('/teacher/courses/detail/questions/{id}', [QuizController::class, 'updateQuestion'])->name('update.question');
    Route::delete('/teacher/courses/detail/questions/{id}', [QuizController::class, 'deleteQuestion'])->name('delete.question');

    
    //STUDENTS
    Route::get('/teacher/courses/detail/student/{slug}/show', [GuruController::class, 'showStudent'])->name('show.siswa');
    Route::get('/teacher/courses/detail/student/{slug}', [GuruController::class, 'createStudent'])->name('siswa.courses');
    Route::post('/teacher/courses/detail/student/{id}/store', [GuruController::class, 'storeStudent'])->name('store.siswa');
});

require __DIR__.'/auth.php';
