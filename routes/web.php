<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;

// Strona główna (welcome.blade.php)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard z middleware dla użytkowników zalogowanych
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Reguły dotyczące komentarzy
Route::middleware('auth')->group(function () {
    // Wyświetlanie listy komentarzy
    Route::get('/comments', [CommentsController::class, 'index'])->name('comments');

    // Tworzenie nowego komentarza
    Route::get('/create', [CommentsController::class, 'create'])->name('create');
    Route::post('/store', [CommentsController::class, 'store'])->name('store');

    // Edycja i aktualizacja komentarza
    Route::get('/edit/{id}', [CommentsController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [CommentsController::class, 'update'])->name('update');

    // Usuwanie komentarza
    Route::delete('/delete/{id}', [CommentsController::class, 'destroy'])->name('delete');
});

// Profile użytkownika
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Import pliku auth.php
require __DIR__.'/auth.php';
