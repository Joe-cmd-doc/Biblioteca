@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $book->titol }}</h1>
    <p><strong>Autor:</strong> {{ $book->autor }}</p>
    <p><strong>Año de Publicación:</strong> {{ $book->any_publicacio }}</p>
    <p><strong>Descripción:</strong> {{ $book->descripcio }}</p>
    <a href="{{ route('books.index') }}" class="btn btn-primary">Volver al listado</a>
</div>
@endsection
