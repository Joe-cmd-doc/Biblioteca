@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Libros</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Añadir Nuevo Libro</a>
    <div class="list-group">
        @foreach($books as $book)
        <div class="list-group-item">
            <h4>{{ $book->titol }}</h4>
            <p>{{ $book->autor }} - {{ $book->any_publicacio }}</p>
            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">Ver detalles</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
