@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Librería</h2>

    <form action="{{ route('librerias.update', $libreria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $libreria->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="pais" class="form-label">Pais</label>
            <input type="text" name="pais" class="form-control" value="{{ $libreria->pais }}" required>
        </div>

        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" name="ciudad" class="form-control" value="{{ $libreria->ciudad }}" required>
        </div>
        <div class="mb-3">
            <label for="cp" class="form-label">Cp</label>
            <input type="text" name="cp" class="form-control" value="{{ $libreria->cp }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('librerias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
