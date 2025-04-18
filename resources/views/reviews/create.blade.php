@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Escribir Reseña</h1>
    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="text">Reseña</label>
            <textarea name="text" id="text" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="puntuacio">Puntuación</label>
            <input type="number" name="puntuacio" id="puntuacio" class="form-control" min="1" max="5" required>
        </div>
        <input type="hidden" name="id_llibre" value="{{ $bookId }}">
        <button type="submit" class="btn btn-success mt-3">Guardar Reseña</button>
    </form>
</div>
@endsection
