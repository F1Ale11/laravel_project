@extends('layouts.app')

@section('content')
<style>
    .hero {
        background: url('https://imparcialoaxaca.mx/wp-content/uploads/2024/06/Tamano-fotos-2024-06-03T062151.483.png') center/cover no-repeat;
        height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgb(248, 248, 3);
        text-align: center;
        font-size: 1.8rem;
        font-weight: bold;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
    }
    .btn-custom {
        background: #2c3e50;
        color: white;
        transition: 0.3s;
    }
    .btn-custom:hover {
        background: #1a252f;
        color: white;
    }
</style>

<div class="hero">
    <div>
        <h1>Bienvenidx a la Utopia</h1>
        <p>Wacha checa los libros</p>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center mb-4">Accede rapidamente</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Editoriales</h5>
                    <p class="card-text">Administra las editoriales de los libros</p>
                    <a href="{{ route('editoriales.index') }}" class="btn btn-custom">Ver Editoriales</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Autores</h5>
                    <p class="card-text">Gestiona la información de los autores</p>
                    <a href="{{ route('autores.index') }}" class="btn btn-custom">Ver Autores</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Títulos</h5>
                    <p class="card-text">Explora y administra los libros disponibles</p>
                    <a href="{{ route('titulos.index') }}" class="btn btn-custom">Ver Títulos</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
