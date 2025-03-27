@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Agregar Comentario</h2>
    <form action="{{ route('comentarios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="observacion" class="form-label">Observación</label>
            <textarea name="observacion" id="observacion" rows="4" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="autor_id" class="form-label">Autor</label>
            <select name="autor_id" id="autor_id" class="form-control" required>
                <option value="">Selecciona un autor</option>
                @foreach($autores as $autor)
                    <option value="{{ $autor->id }}">{{ $autor->nombre }} {{ $autor->apellido }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-custom">Guardar</button>
        <a href="{{ route('comentarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
