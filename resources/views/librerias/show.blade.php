@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles de la Librería</h2>
    
    <p><strong>Nombre:</strong> {{ $libreria->nombre }}</p>
    <p><strong>Dirección:</strong> {{ $libreria->pais }}</p>
    <p><strong>Dirección:</strong> {{ $libreria->ciudad }}</p>
    <p><strong>Dirección:</strong> {{ $libreria->cp }}</p>

    <a href="{{ route('librerias.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
