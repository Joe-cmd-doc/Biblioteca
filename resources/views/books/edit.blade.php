@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Libro</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titol">Título</label>
            <input type="text" name="titol" id="titol" class="form-control" value="{{ $book->titol }}" required>
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" value="{{ $book->autor }}" required>
        </div>
        <div class="form-group">
            <label for="any_publicacio">Año de Publicación</label>
            <input type="number" name="any_publicacio" id="any_publicacio" class="form-control" value="{{ $book->any_publicacio }}" required>
        </div>
        <div class="form-group">
            <label for="descripcio">Descripción</label>
            <textarea name="descripcio" id="descripcio" class="form-control" rows="4">{{ $book->descripcio }}</textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Actualizar Libro</button>
    </form>
</div>
@endsection
