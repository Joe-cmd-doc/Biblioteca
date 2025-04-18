<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LoanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de perfil (solo usuarios autenticados)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('books', BookController::class)->only(['index', 'show']);

/
Route::middleware(['auth', 'can:is_admin'])->group(function () {
    Route::resource('books', BookController::class)->except(['index', 'show']);
});


Route::resource('loans', LoanController::class)->middleware('auth');


Route::resource('reviews', ReviewController::class)->middleware('auth');

require __DIR__.'/auth.php';
