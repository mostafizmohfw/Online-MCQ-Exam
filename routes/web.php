<?php

use App\Manager\ScriptManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ProfileController;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('category', [ScriptManager::class, 'getCategoryData']);
    Route::post('quiz-submit', [QuizController::class, 'quizSubmit'])->name('quiz.submit');
    Route::resource('quiz', QuizController::class);
    Route::get('add-question/{id}', [QuizController::class, 'viewAddQuestion'])->name('viewAddQuestion');
    Route::post('add-question', [QuizController::class, 'addQuestion'])->name('add.question');
    Route::resource('result', ResultController::class);

    Route::get('/certificate-download/pdf/{id}', [PdfController::class, 'certificate'])->name('generate.pdf');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
