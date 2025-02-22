<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CommentController;
Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect()->route('questions.index');
    });

    Route::get('questions/my', [QuestionController::class, 'myQuestions'])->name('questions.my');

    Route::resource('questions', QuestionController::class)->except(['show']);

    Route::get('/questions/{question}', [QuestionController::class, 'show'])
        ->where('question', '[0-9]+') // Enforce only numeric IDs
        ->name('questions.show');

    // Comment routes
    Route::post('/questions/{question}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
