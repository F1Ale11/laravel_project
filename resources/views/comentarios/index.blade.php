@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Comentarios</h2>
    <a href="{{ route('comentarios.create') }}" class="btn btn-custom mb-3">Agregar Comentario</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Observación</th>
                <th>Autor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comentarios as $comentario)
            <tr>
                <td>{{ $comentario->id }}</td>
                <td>{{ $comentario->observacion }}</td>
                <td>{{ $comentario->autor->nombre ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('comentarios.edit', $comentario->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('comentarios.destroy', $comentario->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar comentario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
