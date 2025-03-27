@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Regalía</h1>
    <form action="{{ route('regalias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="rango_inicial" class="form-label">Rango Inicial</label>
            <input type="number" step="0.01" name="rango_inicial" class="form-control" id="rango_inicial" required>
        </div>
        <div class="mb-3">
            <label for="rango_final" class="form-label">Rango Final</label>
            <input type="number" step="0.01" name="rango_final" class="form-control" id="rango_final" required>
        </div>
        <div class="mb-3">
            <label for="regali" class="form-label">Regalía</label>
            <input type="number" step="0.01" name="regali" class="form-control" id="regali" required>
        </div>
        <div class="mb-3">
            <label for="titulo_id" class="form-label">Título</label>
            <select name="titulo_id" id="titulo_id" class="form-control" required>
                <option value="">Selecciona un título</option>
                @foreach($titulos as $titulo)
                    <option value="{{ $titulo->id }}">{{ $titulo->titulo }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-custom">Guardar</button>
    </form>
</div>
@endsection
