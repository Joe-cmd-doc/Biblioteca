@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Solicitar Préstamo</h1>
    <form action="{{ route('loans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="data_inci">Fecha de Inicio</label>
            <input type="date" name="data_inci" id="data_inci" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="data_final">Fecha de Devolución</label>
            <input type="date" name="data_final" id="data_final" class="form-control" required>
        </div>
        <input type="hidden" name="id_llibre" value="{{ $bookId }}">
        <button type="submit" class="btn btn-success mt-3">Solicitar Préstamo</button>
    </form>
</div>
@endsection
