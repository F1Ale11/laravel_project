@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Descuento</h2>
    <form action="{{ route('descuentos.update', $descuento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="rango_inicial" class="form-label">Rango Inicial</label>
            <input type="number" step="0.01" name="rango_inicial" id="rango_inicial" class="form-control" value="{{ $descuento->rango_inicial }}" required>
        </div>
        <div class="mb-3">
            <label for="rango_final" class="form-label">Rango Final</label>
            <input type="number" step="0.01" name="rango_final" id="rango_final" class="form-control" value="{{ $descuento->rango_final }}" required>
        </div>
        <div class="mb-3">
            <label for="descuento" class="form-label">Descuento (%)</label>
            <input type="number" step="0.01" name="descuento" id="descuento" class="form-control" value="{{ $descuento->descuento }}" required>
        </div>
        <div class="mb-3">
            <label for="libreria_id" class="form-label">Librería</label>
            <select name="libreria_id" id="libreria_id" class="form-control" required>
                @foreach($librerias as $libreria)
                    <option value="{{ $libreria->id }}" {{ $descuento->libreria_id == $libreria->id ? 'selected' : '' }}>
                        {{ $libreria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-custom">Actualizar</button>
        <a href="{{ route('descuentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
