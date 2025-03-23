@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Autores</h1>
    <a href="{{ route('autores.create') }}" class="btn btn-custom">Agregar Autor</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($autores as $autor)
        <tr>
            <td>{{ $autor->id }}</td>
            <td>{{ $autor->nombre }}</td>
            <td>{{ $autor->apellido }}</td>
            <td>{{ $autor->email }}</td>
            <td>
                <a href="{{ route('autores.edit', $autor->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este autor?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
