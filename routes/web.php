<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LoanController;

use App\Models\Book;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [BookController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rutas de perfil (solo usuarios autenticados)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/books/{id}', [BookController::class, 'show'])->name('books');



Route::middleware(['auth', 'can:is_admin'])->group(function () {
    Route::resource('books', BookController::class)->except(['index', 'show']);
});


Route::resource('loans', LoanController::class)->middleware('auth');


Route::resource('reviews', ReviewController::class)->middleware('auth');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    // Mostrar reseñas de un libro
    Route::get('/books/{bookId}/reviews', [ReviewController::class, 'show'])->name('reviews.show');

    // Mostrar formulario para crear una nueva reseña
    Route::get('/books/{bookId}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');

    // Guardar una nueva reseña
    Route::post('/books/{bookId}/reviews', [ReviewController::class, 'store'])->name('reviews.store');


    // Editar una reseña
    Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');

    // Actualizar una reseña
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');

    // Eliminar una reseña
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});
