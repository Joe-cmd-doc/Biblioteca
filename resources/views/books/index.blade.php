@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Libros</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add new book</a>
    <div class="list-group">
        @foreach($books as $book)
        <div class="list-group-item">
            <h4>{{ $book->title }}</h4>
            <p>{{ $book->author }} - {{ $book->publication_year }}</p>
            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">See details</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
