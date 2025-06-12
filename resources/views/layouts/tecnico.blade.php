<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Panel Técnico - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        nav {
            background-color: #0d6efd;
        }
        nav ul {
            list-style: none;
            display: flex;
            gap: 1rem;
            margin: 0;
            padding: .75rem 1rem;
        }
        nav ul li a {
            color: white;
            font-weight: 600;
            text-decoration: none;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <nav>
        <ul class="container">
            <li><a href="{{ route('tecnico.produccion') }}">Producción</a></li>
            <li><a href="{{ route('tecnico.mantenimiento') }}">Mantenimiento</a></li>
            <li><a href="{{ route('tecnico.perfil') }}">Mi Perfil</a></li>
            <li><a href="{{ route('tecnico.contacto') }}">Contacto</a></li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar sesión
                </a>
            </li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
