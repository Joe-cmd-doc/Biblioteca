<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function show($bookId)
    {
        $book = Book::findOrFail($bookId);
        $reviews = $book->reviews;
        return view('reviews.show', compact('book', 'reviews'));
    }


    public function create($bookId)
    {
        $book = Book::findOrFail($bookId);
        return view('reviews.create', compact('book'));
    }


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

        return redirect()->route('books.show', $bookId);
    }


    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit', compact('review'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = Review::findOrFail($id);
        $review->update($request->all());
        return redirect()->route('books.show', $review->book_id);
    }

    public function destroy($id)
    {

        $review = Review::findOrFail($id);
        $bookId = $review->book_id;


        if ($review->user_id !== auth()->id() && !auth()->user()->is_admin) {

            abort(403, 'No tienes permiso para eliminar esta reseña.');
        }


        $review->delete();


        return redirect()->route('books', $bookId);
    }


}
