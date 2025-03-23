@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="m-0">Editoriales</h1>
    <div>
      <a href="{{ route('editoriales.create') }}" class="btn btn-custom mr-2">Agregar Editorial</a>
      <a href="{{ url('editoriales_imprimir') }}" class="btn btn-primary" target="_blank">Generar PDF</a>
    </div>
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
            <th>Ciudad</th>
            <th>Estado</th>
            <th>Número</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($editoriales as $editorial)
        <tr>
            <td>{{ $editorial->id }}</td>
            <td>{{ $editorial->nombre }}</td>
            <td>{{ $editorial->ciudad }}</td>
            <td>{{ $editorial->estado }}</td>
            <td>{{ $editorial->numero }}</td>
            <td>
                <a href="{{ route('editoriales.edit', $editorial->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('editoriales.destroy', $editorial->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminarlo?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
