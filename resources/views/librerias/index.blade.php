@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Librerías</h2>
    
    <a href="{{ route('librerias.create') }}" class="btn btn-success mb-3">Agregar Nueva</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Pais</th>
                <th>Ciudad</th>
                <th>Cp</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($librerias as $libreria)
            <tr>
                <td>{{ $libreria->id }}</td>
                <td>{{ $libreria->nombre }}</td>
                <td>{{ $libreria->pais }}</td>
                <td>{{ $libreria->ciudad }}</td>
                <td>{{ $libreria->cp }}</td>
                <td>
                    <a href="{{ route('librerias.show', $libreria->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('librerias.edit', $libreria->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('librerias.destroy', $libreria->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar librería?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
