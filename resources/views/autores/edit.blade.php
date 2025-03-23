@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Autor</h1>
    <form action="{{ route('autores.update', $autor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $autor->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" id="apellido" value="{{ $autor->apellido }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $autor->email }}" required>
        </div>
        <button type="submit" class="btn btn-custom">Actualizar</button>
    </form>
</div>
@endsection
