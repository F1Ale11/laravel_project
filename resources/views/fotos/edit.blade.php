@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Foto</h2>
    <form action="{{ route('fotos.update', $foto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="formato" class="form-label">Formato</label>
            <input type="text" name="formato" id="formato" class="form-control" value="{{ $foto->formato }}" required>
        </div>
        <div class="mb-3">
            <label for="tamaño" class="form-label">Tamaño</label>
            <input type="text" name="tamaño" id="tamaño" class="form-control" value="{{ $foto->tamaño }}" required>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto (ruta o URL)</label>
            <input type="text" name="foto" id="foto" class="form-control" value="{{ $foto->foto }}" required>
        </div>
        <div class="mb-3">
            <label for="autor_id" class="form-label">Autor</label>
            <select name="autor_id" id="autor_id" class="form-control" required>
                @foreach($autores as $autor)
                    <option value="{{ $autor->id }}" {{ $foto->autor_id == $autor->id ? 'selected' : '' }}>
                        {{ $autor->nombre }} {{ $autor->apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-custom">Actualizar</button>
        <a href="{{ route('fotos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
