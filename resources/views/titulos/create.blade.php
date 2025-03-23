@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Título</h1>
    <form action="{{ route('titulos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" id="titulo" required>
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" name="tipo" class="form-control" id="tipo" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" id="precio" required>
        </div>
        <div class="mb-3">
            <label for="adelanto" class="form-label">Adelanto</label>
            <input type="number" step="0.01" name="adelanto" class="form-control" id="adelanto" required>
        </div>
        <div class="mb-3">
            <label for="ventas_totales" class="form-label">Ventas Totales</label>
            <input type="number" name="ventas_totales" class="form-control" id="ventas_totales" required>
        </div>
        <div class="mb-3">
            <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
            <input type="date" name="fecha_publicacion" class="form-control" id="fecha_publicacion" required>
        </div>
        <div class="mb-3">
            <label for="nota" class="form-label">Nota</label>
            <textarea name="nota" class="form-control" id="nota" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="editorial_id" class="form-label">Editorial</label>
            <select name="editorial_id" class="form-control" id="editorial_id" required>
                <option value="">Selecciona una editorial</option>
                @foreach($editoriales as $editorial)
                    <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="autores" class="form-label">Autores</label>
            <select name="autores[]" class="form-control" id="autores" multiple required>
                @foreach($autores as $autor)
                    <option value="{{ $autor->id }}">{{ $autor->nombre }} {{ $autor->apellido }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-custom">Guardar</button>
    </form>
</div>
@endsection
