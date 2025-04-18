@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Añadir Nuevo Libro</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titol">Título</label>
            <input type="text" name="titol" id="titol" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="any_publicacio">Año de Publicación</label>
            <input type="number" name="any_publicacio" id="any_publicacio" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcio">Descripción</label>
            <textarea name="descripcio" id="descripcio" class="form-control" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Guardar Libro</button>
    </form>
</div>
@endsection
