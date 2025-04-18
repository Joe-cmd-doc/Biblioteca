@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis Préstamos</h1>
    <div class="list-group">
        @foreach($loans as $loan)
        <div class="list-group-item">
            <p><strong>Libro:</strong> {{ $loan->book->titol }}</p>
            <p><strong>Fecha de Inicio:</strong> {{ $loan->data_inci }}</p>
            <p><strong>Fecha de Devolución:</strong> {{ $loan->data_final }}</p>
            <form action="{{ route('loans.destroy', $loan->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar Préstamo</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
