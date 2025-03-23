@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Editorial</h1>
    <form action="{{ route('editoriales.update', $editorial->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $editorial->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" name="ciudad" class="form-control" id="ciudad" value="{{ $editorial->ciudad }}" required>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" name="estado" class="form-control" id="estado" value="{{ $editorial->estado }}" required>
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="number" name="numero" class="form-control" id="numero" value="{{ $editorial->numero }}" required>
        </div>
        <button type="submit" class="btn btn-custom">Actualizar</button>
    </form>
</div>
@endsection
