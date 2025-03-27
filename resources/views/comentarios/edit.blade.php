@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Comentario</h2>
    <form action="{{ route('comentarios.update', $comentario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="observacion" class="form-label">Observación</label>
            <textarea name="observacion" id="observacion" rows="4" class="form-control" required>{{ $comentario->observacion }}</textarea>
        </div>
        <div class="mb-3">
            <label for="autor_id" class="form-label">Autor</label>
            <select name="autor_id" id="autor_id" class="form-control" required>
                @foreach($autores as $autor)
                    <option value="{{ $autor->id }}" {{ $comentario->autor_id == $autor->id ? 'selected' : '' }}>
                        {{ $autor->nombre }} {{ $autor->apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-custom">Actualizar</button>
        <a href="{{ route('comentarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
