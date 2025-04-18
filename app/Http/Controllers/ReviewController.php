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
            'text' => 'required|string',
            'puntuacio' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'text' => $request->text,
            'puntuacio' => $request->puntuacio,
            'id_usuari' => auth()->id(),
            'id_llibre' => $bookId,
        ]);

        return redirect()->route('reviews.show', $bookId); // Redirigir a la página del libro
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
        return redirect()->route('reviews.show', $review->id_llibre); // Redirigir a la página del libro
    }

    // Eliminar una reseña
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $this->authorize('is_owner', $review); // Verificar que el usuario es el propietario de la reseña

        $review->delete(); // Eliminar la reseña
        return redirect()->route('reviews.show', $review->id_llibre); // Redirigir a la página del libro
    }
}
