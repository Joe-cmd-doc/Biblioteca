<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    // Mostrar los préstamos del usuario autenticado
    public function index()
    {
        $loans = Loan::where('id_usuari', auth()->id())->get(); // Obtener los préstamos del usuario logueado
        return view('loans.index', compact('loans'));
    }

    // Solicitar un préstamo
    public function create($bookId)
    {
        $book = Book::findOrFail($bookId); // Obtener el libro por ID
        return view('loans.create', compact('book'));
    }

    // Guardar un préstamo
    public function store(Request $request, $bookId)
    {
        $request->validate([
            'data_inci' => 'required|date',
            'data_final' => 'required|date',
        ]);

        Loan::create([
            'data_inci' => $request->data_inci,
            'data_final' => $request->data_final,
            'id_usuari' => auth()->id(),
            'id_llibre' => $bookId,
        ]);

        return redirect()->route('loans.index'); // Redirigir al listado de préstamos
    }

    // Devolver un libro
    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        $this->authorize('is_owner', $loan); // Verificar que el usuario es el propietario del préstamo

        $loan->delete(); // Eliminar el préstamo
        return redirect()->route('loans.index');
    }
}
