<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Autores, Títulos y Editoriales</title>
    <!-- Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Paleta de colores personalizada */
        :root {
            --color-primario: #2E5077;
            --color-secundario: #4DA1A9;
            --color-terciario: #79D7BE;
            --color-fondo: #F6F4F0;
        }

        body {
            background-color: var(--color-fondo);
        }

        .navbar, .footer {
            background-color: var(--color-primario);
            color: white;
        }

        .btn-custom {
            background-color: var(--color-secundario);
            color: white;
        }

        .btn-custom:hover {
            background-color: var(--color-terciario);
            color: white;
        }
    </style>
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container">
            <h1>@yield('header', 'Bienvenidos a la Pagina de Mi Rancho a tu Pantalla')</h1>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Inicio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('algomal') }}">Generalmente Apropiado</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('ventas') }}">Ventas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('titulos') }}">Títulos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('editoriales') }}">Editoriales</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('autores') }}">Autores</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('librerias') }}">Librerias</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('comentarios') }}">Comentarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('descuentos') }}">Descuentos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('fotos') }}">Fotos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('regalias') }}">Regalias</a></li>
                </ul>
    
                <!-- Verificar si hay sesión activa -->
                <ul class="navbar-nav ms-auto">
                    @auth
                        <!-- Botón de Cerrar Sesión -->
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Cerrar Sesión</button>
                            </form>
                        </li>
                    @else
                        <!-- Botones de Iniciar Sesión y Registrarse -->
                        <li class="nav-item">
                            <a class="btn btn-outline-light btn-sm me-2" href="{{ route('login') }}">Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary btn-sm" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    

    <div class="container">
        @yield('content')
    </div>

    <footer class="footer mt-4 py-3">
        <div class="container text-center">
            <span>© {{ date('Y') }} Mi Proyecto </span>
        </div>
    </footer>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
