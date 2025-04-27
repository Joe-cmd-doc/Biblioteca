<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view('dashboard', compact('books'));
    }


    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }


    public function create()
    {
        return view('books.create');
    }


    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publication_year' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        Book::create($request->all());
        return redirect()->route('dashboard');
    }


    public function edit($id)
    {

        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }


    public function update(Request $request, $id)
    {


        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publication_year' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('dashboard')->with('success', 'Book updated successfully');
    }


   public function destroy($id)
   {

       $book = Book::findOrFail($id);
       $book->delete();
       return redirect()->route('dashboard')->with('success', 'Book deleted successfully');
   }


}
