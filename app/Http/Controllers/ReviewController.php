<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Mostrar todas las reseñas de un libro
    public function show($bookId)
    {
        $book = Book::findOrFail($bookId);
        $reviews = $book->reviews; // Obtener todas las reseñas del libro
        return view('reviews.show', compact('book', 'reviews'));
    }

    // Crear una nueva reseña
    public function create($bookId)
    {
        $book = Book::findOrFail($bookId);
        return view('reviews.create', compact('book'));
    }

    // Guardar la reseña
    public function store(Request $request, $bookId)
    {
        $request->validate([
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'content' => $request->content,
            'rating' => $request->rating,
            'user_id' => auth()->id(),
            'book_id' => $bookId,
        ]);

        return redirect()->route('books', $bookId); // Redirigir a la página del libro
    }

    // Editar una reseña
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit', compact('review'));
    }

    // Actualizar una reseña
    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|string',
            'puntuacio' => 'required|integer|min:1|max:5',
        ]);

        $review = Review::findOrFail($id);
        $review->update($request->all());
        return redirect()->route('books', $review->book_id); // Redirigir a la página del libro
    }

    public function destroy($id)
    {
        // Buscar la reseña por su ID
        $review = Review::findOrFail($id);
        $bookId = $review->book_id;

        // Verificar si el usuario autenticado es el propietario de la reseña o es un administrador
        if ($review->user_id !== auth()->id() && !auth()->user()->is_admin) {
            // Si no es propietario ni admin, se aborta la acción con un error 403
            abort(403, 'No tienes permiso para eliminar esta reseña.');
        }

        // Eliminar la reseña
        $review->delete();

        // Redirigir a la página del libro
        return redirect()->route('books', $bookId); // Redirigir a la página del libro
    }


}
