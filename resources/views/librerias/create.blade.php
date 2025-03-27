@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Agregar Librería</h2>

    <form action="{{ route('librerias.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="calle" class="form-label">Calle</label>
            <input type="text" name="calle" id="calle" class="form-control" value="{{ old('calle') }}">
        </div>
        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{ old('ciudad') }}">
        </div>
        <div class="mb-3">
            <label for="pais" class="form-label">Pais</label>
            <input type="text" name="pais" id="pais" class="form-control" value="{{ old('pais') }}">
        </div>
        <div class="mb-3">
            <label for="cp" class="form-label">CP</label>
            <input type="text" name="cp" id="cp" class="form-control" value="{{ old('cp') }}">
        </div>
        

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('librerias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
