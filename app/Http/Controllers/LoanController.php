<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\User;


class LoanController extends Controller
{

    public function index()
    {
        $loans = Loan::where('user_id', auth()->id())->get();
        return view('loans.index', compact('loans'));
    }


    public function create($bookId)
{
    $book = Book::findOrFail($bookId);


    $loans = Loan::where('book_id', $bookId)
                 ->where('end_date', '>=', now())
                 ->orderBy('end_date', 'desc')
                 ->get();


    $lastLoanEndDate = $loans->isNotEmpty() ? $loans->first()->end_date : now()->subDay()->toDateString();


    $startDateMin = \Carbon\Carbon::parse($lastLoanEndDate)->addDay()->toDateString();


    $users = User::all();
    return view('loans.create', compact('book', 'users', 'startDateMin'));
}





public function store(Request $request)
{

    $request->validate([
        'start_date' => 'required|date|before:end_date',
        'end_date' => 'required|date|after:start_date',
    ]);


    $book = Book::findOrFail($request->book_id);


    $existingLoan = Loan::where('book_id', $book->id)
                        ->where(function ($query) use ($request) {
                            $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                                  ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                                  ->orWhere(function ($query) use ($request) {
                                      $query->where('start_date', '<=', $request->start_date)
                                            ->where('end_date', '>=', $request->end_date);
                                  });
                        })
                        ->exists();


    if ($existingLoan) {
        return redirect()->back()->withErrors(['message' => 'The book is already loaned during the selected dates.']);
    }


    Loan::create([
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'book_id' => $book->id,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('dashboard')->with('success', 'Book loaned successfully.');
}



public function destroy($id)
{
    $loan = Loan::findOrFail($id);

    if (auth()->id() !== $loan->user_id && !auth()->user()->is_admin) {
        return redirect()->route('loans.index')->with('error', 'You do not have permission to delete this loan.');
    }


    $loan->delete();

    return redirect()->route('loans.index');
}

}

