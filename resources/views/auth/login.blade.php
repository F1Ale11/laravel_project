@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg rounded-4 p-4" style="width: 100%; max-width: 400px;">
        <div class="card-body">
            <h2 class="text-center text-primary fw-bold mb-4">Iniciar sesión</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" required autofocus
                        class="form-control form-control-lg rounded-3 shadow-sm">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" required
                        class="form-control form-control-lg rounded-3 shadow-sm">
                </div>

                <button type="submit"
                    class="btn btn-primary btn-lg w-100 rounded-3 shadow-sm fw-bold">
                    Iniciar sesión
                </button>
            </form>

            <p class="mt-4 text-center text-secondary">
                ¿No tienes una cuenta?  
                <a href="{{ route('register') }}" class="text-primary fw-bold text-decoration-none">
                    Regístrate aquí
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
