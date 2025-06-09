<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'CelimaCore - Gestión Integral')</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Colores y estilo personalizado */
        :root {
            --celima-blue: #6aaec3;
            --celima-light: #a5c8d3;
            --celima-dark: #395d6b;
            --celima-bg: #f5f9fb;
            --celima-gray-dark: #3a3a3a;
            --celima-gray-light: #dfe6e9;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--celima-bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: var(--celima-gray-dark);
        }

        main {
            flex-grow: 1;
            padding-top: 2rem;
            padding-bottom: 3rem;
        }

        footer {
            background-color: var(--celima-dark);
            color: #e0e6eb;
            padding: 1rem 0;
            text-align: center;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .navbar {
            background-color: var(--celima-blue);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.6rem;
            color: #fff !important;
        }

        .navbar-nav .nav-link {
            color: #e0e6eb !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:hover {
            color: var(--celima-light) !important;
            font-weight: 700;
        }

        /* Botones */
        .btn-primary {
            background-color: var(--celima-dark);
            border: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--celima-blue);
        }

        /* Formularios */
        input.form-control,
        textarea.form-control {
            border-radius: 0.4rem;
            border: 1.5px solid var(--celima-light);
            transition: border-color 0.3s ease;
            font-size: 1rem;
        }

        input.form-control:focus,
        textarea.form-control:focus {
            border-color: var(--celima-dark);
            box-shadow: none;
        }

        label.form-label {
            font-weight: 600;
            color: var(--celima-dark);
        }

        /* Títulos */
        h1 {
            font-weight: 700;
            color: var(--celima-dark);
            margin-bottom: 1.5rem;
        }

        /* Alertas */
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-radius: 0.4rem;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 0.4rem;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
        }

        /* Responsive padding */
        @media (min-width: 768px) {
            main.container {
                max-width: 720px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">CelimaCore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-3">
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('home')) active @endif" href="{{ route('home') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('about')) active @endif" href="{{ route('about') }}">Quiénes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('contact')) active @endif" href="{{ route('contact') }}">Contáctanos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('login.form')) active @endif" href="{{ route('login.form') }}">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('register.form')) active @endif" href="{{ route('register.form') }}">Registro</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container">
    @if(session('success'))
        <div class="alert alert-success shadow-sm rounded">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger shadow-sm rounded">{{ session('error') }}</div>
    @endif

    @yield('content')
</main>

<footer>
    &copy; {{ date('Y') }} CelimaCore — Gestión Integral de Producción y Mantenimiento
</footer>

<!-- Bootstrap JS Bundle CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
