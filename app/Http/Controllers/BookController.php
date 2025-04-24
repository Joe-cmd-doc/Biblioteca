<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Mostrar todos los libros (público)
    public function index()
    {
        $books = Book::all(); // Obtener todos los libros
        return view('dashboard', compact('books'));
    }

    // Mostrar un libro específico (público)
    public function show($id)
    {
        $book = Book::findOrFail($id); // Obtener el libro por ID
        return view('books.show', compact('book'));
    }

    // Crear un nuevo libro (solo admins)
    public function create()
    {
        $this->authorize('is_admin'); // Aseguramos que el usuario es admin
        return view('books.create');
    }

    // Guardar un nuevo libro (solo admins)
    public function store(Request $request)
    {
        $this->authorize('is_admin'); // Aseguramos que el usuario es admin

        $request->validate([
            'titol' => 'required|max:255',
            'autor' => 'required|max:255',
            'any_publicacio' => 'required|integer',
            'descripcio' => 'nullable|string',
        ]);

        Book::create($request->all()); // Crear el libro en la base de datos
        return redirect()->route('books.index'); // Redirigir al listado de libros
    }

    // Editar un libro (solo admins)
    public function edit($id)
    {
        $this->authorize('is_admin'); // Aseguramos que el usuario es admin
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    // Actualizar un libro (solo admins)
    public function update(Request $request, $id)
    {
        $this->authorize('is_admin'); // Aseguramos que el usuario es admin

        $request->validate([
            'titol' => 'required|max:255',
            'autor' => 'required|max:255',
            'any_publicacio' => 'required|integer',
            'descripcio' => 'nullable|string',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('books.index');
    }

    // Eliminar un libro (solo admins)
    public function destroy($id)
    {
        $this->authorize('is_admin'); // Aseguramos que el usuario es admin

        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
