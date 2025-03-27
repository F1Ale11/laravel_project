@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Ventas</h1>
    <a href="{{ route('ventas.create') }}" class="btn btn-custom">Registrar Venta</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Librería</th>
            <th>Detalles (Títulos y Cantidad)</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ventas as $venta)
        <tr>
            <td>{{ $venta->id }}</td>
            <td>{{ $venta->fecha }}</td>
            <td>{{ $venta->libreria->nombre }}</td>
            <td>
                @foreach($venta->titulos as $titulo)
                    <strong>{{ $titulo->titulo }}</strong>: {{ $titulo->pivot->cantidad }}<br>
                @endforeach
            </td>
            <td>
                <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta venta?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
