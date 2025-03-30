<nav class="bg-white border-b border-gray-200 px-4 py-3">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-lg font-bold">Mi Aplicación</a>

        <div>
            @auth
                <!-- Si el usuario está autenticado -->
                <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="ml-4 text-red-600 hover:text-red-900">Cerrar sesión</button>
                </form>
            @else
                <!-- Si el usuario NO está autenticado -->
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="ml-4 text-blue-600 hover:text-blue-900">Registrarse</a>
            @endauth
        </div>
    </div>
</nav>
