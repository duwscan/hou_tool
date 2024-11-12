<?php

use App\Http\Controllers\Chatbot\ThreadController;
use App\Http\Controllers\Faculty\FacultyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Dashboard');
});
Route::resource('threads', ThreadController::class)->only(['index', 'update', 'destroy', 'store']);
Route::resource('threads.chats', \App\Http\Controllers\Chatbot\ChatController::class)->only(['index', 'store']);
Route::get('/chat', function () {
    return Inertia::render('Chat/Chat');
});
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');
Route::get('/faculty/{faculty}', [FacultyController::class, 'show'])->name('faculty.show');
require __DIR__ . '/auth.php';
