@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Títulos</h1>
    <a href="{{ route('titulos.create') }}" class="btn btn-custom">Agregar Título</a>
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
            <th>Título</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Editorial</th>
            <th>Autores</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($titulos as $titulo)
        <tr>
            <td>{{ $titulo->id }}</td>
            <td>{{ $titulo->titulo }}</td>
            <td>{{ $titulo->tipo }}</td>
            <td>{{ $titulo->precio }}</td>
            <td>{{ $titulo->editorial->nombre ?? 'N/A' }}</td>
            <td>
                @foreach($titulo->autores as $autor)
                    {{ $autor->nombre }} {{ $autor->apellido }},
                @endforeach
            </td>
            <td>
                <a href="{{ route('titulos.edit', $titulo->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('titulos.destroy', $titulo->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este título?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
