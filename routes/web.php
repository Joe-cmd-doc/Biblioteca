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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});




Route::resource('loans', LoanController::class)->middleware('auth');

Route::middleware('auth')->group(function () {

    Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
    Route::get('/loans/create/{bookId}', [LoanController::class, 'create'])->name('loans.create');
    Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
    Route::get('/loans/{loan}', [LoanController::class, 'show'])->name('loans.show');
    Route::delete('/loans/{loan}', [LoanController::class, 'destroy'])->name('loans.destroy');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/books/{bookId}/reviews', [ReviewController::class, 'show'])->name('reviews.show');
    Route::get('/books/{bookId}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/books/{bookId}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});




require __DIR__.'/auth.php';


