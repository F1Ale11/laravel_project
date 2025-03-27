@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Regalía</h2>
    
    <form action="{{ route('regalias.update', $regalia->id) }}" method="POST">
        @csrf
        @method('PUT')  {{-- Esto indica que es una actualización --}}

        <div class="mb-3">
            <label for="rango_inicial" class="form-label">Rango Inicial</label>
            <input type="number" name="rango_inicial" class="form-control" value="{{ $regalia->rango_inicial }}" required>
        </div>

        <div class="mb-3">
            <label for="rango_final" class="form-label">Rango Final</label>
            <input type="number" name="rango_final" class="form-control" value="{{ $regalia->rango_final }}" required>
        </div>

        <div class="mb-3">
            <label for="regali" class="form-label">Regalía</label>
            <input type="number" step="0.01" name="regali" class="form-control" value="{{ $regalia->regali }}" required>
        </div>

        <div class="mb-3">
            <label for="titulo_id" class="form-label">Título</label>
            <select name="titulo_id" class="form-control" required>
                @foreach ($titulos as $titulo)
                    <option value="{{ $titulo->id }}" {{ $regalia->titulo_id == $titulo->id ? 'selected' : '' }}>
                        {{ $titulo->titulo }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('regalias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
