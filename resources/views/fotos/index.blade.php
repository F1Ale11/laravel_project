@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Fotos</h2>
    <a href="{{ route('fotos.create') }}" class="btn btn-custom mb-3">Agregar Foto</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Formato</th>
                <th>Tamaño</th>
                <th>Foto</th>
                <th>Autor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fotos as $foto)
            <tr>
                <td>{{ $foto->id }}</td>
                <td>{{ $foto->formato }}</td>
                <td>{{ $foto->tamaño }}</td>
                <td>{{ $foto->foto }}</td>
                <td>{{ $foto->autor->nombre ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('fotos.edit', $foto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('fotos.destroy', $foto->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar foto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
