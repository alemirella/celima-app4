<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'CelimaCore - Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --celima-blue: #6aaec3;
            --celima-light: #a5c8d3;
            --celima-dark: #395d6b;
            --celima-bg: #f5f9fb;
            --celima-gray-dark: #3a3a3a;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--celima-bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: var(--celima-gray-dark);
        }

        footer {
            background-color: var(--celima-dark);
            color: #e0e6eb;
            text-align: center;
            padding: 1rem;
        }

        .navbar {
            background-color: var(--celima-dark);
        }

        .nav-link {
            color: #f8f9fa !important;
        }

        .nav-link.active, .nav-link:hover {
            font-weight: bold;
            color: var(--celima-light) !important;
        }

        .btn-logout {
            background-color: transparent;
            border: none;
            color: #f8f9fa;
        }

        main.container {
            padding-top: 2rem;
            padding-bottom: 3rem;
        }

        h1 {
            font-weight: bold;
            color: var(--celima-dark);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="#">CelimaCore Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav ms-auto gap-3">
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.produccion.index')) active @endif" href="{{ route('admin.produccion.index') }}">Producción</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.mantenimiento')) active @endif" href="{{ route('admin.mantenimiento') }}">Mantenimiento</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.usuarios')) active @endif" href="{{ route('admin.usuarios') }}">Usuarios</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.perfil')) active @endif" href="{{ route('admin.perfil') }}">Perfil</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.soporte')) active @endif" href="{{ route('admin.soporte') }}">Soporte</a></li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn-logout nav-link" type="submit">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container">
    @yield('content')
</main>

<footer>
    &copy; {{ date('Y') }} CelimaCore — Panel de Administración
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


