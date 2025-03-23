@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Editorial</h1>
    <form action="{{ route('editoriales.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required>
        </div>
        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" name="ciudad" class="form-control" id="ciudad" required>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" name="estado" class="form-control" id="estado" required>
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="number" name="numero" class="form-control" id="numero" required>
        </div>
        <button type="submit" class="btn btn-custom">Guardar</button>
    </form>
</div>
@endsection
