@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reseñas del Libro</h1>
    <div class="list-group">
        @foreach($reviews as $review)
        <div class="list-group-item">
            <p><strong>Reseña:</strong> {{ $review->text }}</p>
            <p><strong>Puntuación:</strong> {{ $review->puntuacio }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
