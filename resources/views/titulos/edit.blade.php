@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Título</h1>
    <form action="{{ route('titulos.update', $titulo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" id="titulo" value="{{ $titulo->titulo }}" required>
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" name="tipo" class="form-control" id="tipo" value="{{ $titulo->tipo }}" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" id="precio" value="{{ $titulo->precio }}" required>
        </div>
        <div class="mb-3">
            <label for="adelanto" class="form-label">Adelanto</label>
            <input type="number" step="0.01" name="adelanto" class="form-control" id="adelanto" value="{{ $titulo->adelanto }}" required>
        </div>
        <div class="mb-3">
            <label for="ventas_totales" class="form-label">Ventas Totales</label>
            <input type="number" name="ventas_totales" class="form-control" id="ventas_totales" value="{{ $titulo->ventas_totales }}" required>
        </div>
        <div class="mb-3">
            <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
            <input type="date" name="fecha_publicacion" class="form-control" id="fecha_publicacion" value="{{ $titulo->fecha_publicacion }}" required>
        </div>
        <div class="mb-3">
            <label for="nota" class="form-label">Nota</label>
            <textarea name="nota" class="form-control" id="nota" rows="3">{{ $titulo->nota }}</textarea>
        </div>
        <div class="mb-3">
            <label for="editorial_id" class="form-label">Editorial</label>
            <select name="editorial_id" class="form-control" id="editorial_id" required>
                <option value="">Selecciona una editorial</option>
                @foreach($editoriales as $editorial)
                    <option value="{{ $editorial->id }}" @if($titulo->editorial_id == $editorial->id) selected @endif>
                        {{ $editorial->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="autores" class="form-label">Autores</label>
            <select name="autores[]" class="form-control" id="autores" multiple required>
                @foreach($autores as $autor)
                    <option value="{{ $autor->id }}"
                        @if($titulo->autores->pluck('id')->contains($autor->id)) selected @endif>
                        {{ $autor->nombre }} {{ $autor->apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-custom">Actualizar</button>
    </form>
</div>
@endsection
