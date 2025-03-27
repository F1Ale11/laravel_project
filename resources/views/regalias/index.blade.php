@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Regalías</h1>
    <a href="{{ route('regalias.create') }}" class="btn btn-custom">Agregar Regalía</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Rango Inicial</th>
            <th>Rango Final</th>
            <th>Regalía</th>
            <th>Título</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($regalias as $regalia)
        <tr>
            <td>{{ $regalia->id }}</td>
            <td>{{ $regalia->rango_inicial }}</td>
            <td>{{ $regalia->rango_final }}</td>
            <td>{{ $regalia->regali }}</td>
            <td>{{ $regalia->titulo->titulo ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('regalias.edit', $regalia->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('regalias.destroy', $regalia->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta regalía?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
