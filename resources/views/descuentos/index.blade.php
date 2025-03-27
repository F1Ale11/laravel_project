@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Descuentos</h2>
    <a href="{{ route('descuentos.create') }}" class="btn btn-custom mb-3">Agregar Descuento</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Rango Inicial</th>
                <th>Rango Final</th>
                <th>Descuento</th>
                <th>Librería</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($descuentos as $descuento)
            <tr>
                <td>{{ $descuento->id }}</td>
                <td>{{ $descuento->rango_inicial }}</td>
                <td>{{ $descuento->rango_final }}</td>
                <td>{{ $descuento->descuento }}</td>
                <td>{{ $descuento->libreria->nombre ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('descuentos.edit', $descuento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('descuentos.destroy', $descuento->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar descuento?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
