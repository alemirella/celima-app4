<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'GestuM - Gestión Integral')</title>

    <!-- Bootstrap & Fuentes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Estilos personalizados --}}
    @include('layouts.designs.app_design')
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top shadow-sm">
    <div class="container py-2">
        <a class="navbar-brand" href="{{ route('home') }}">
            <span style="font-family: 'Segoe UI', sans-serif; font-weight: 800; font-size: 1.5rem; letter-spacing: -0.5px;">
                GestuM
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav gap-2">
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

<main class="container fade-slide-up show">
    @if(session('success'))
        <div class="alert alert-success shadow-sm mt-4">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger shadow-sm mt-4">{{ session('error') }}</div>
    @endif

    <div class="card-custom mt-4">
        @yield('content')
    </div>
</main>

<footer class="mt-auto">
    <div class="footer-social">
        <a href="https://facebook.com" target="_blank" aria-label="Facebook">
            <i class="bi bi-facebook"></i>
        </a>
        <a href="https://instagram.com" target="_blank" aria-label="Instagram">
            <i class="bi bi-instagram"></i>
        </a>
        <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn">
            <i class="bi bi-linkedin"></i>
        </a>
    </div>
    &copy; {{ date('Y') }} <strong>GestuM</strong> — Gestión Integral de Producción y Mantenimiento
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Navbar dinámica con sombra al hacer scroll
    window.addEventListener('scroll', function () {
        const nav = document.querySelector('.navbar');
        if (window.scrollY > 10) {
            nav.classList.add('navbar-scrolled');
        } else {
            nav.classList.remove('navbar-scrolled');
        }
    });

    // Funcionalidad de secciones colapsables
    function toggleCollapse(element) {
        const content = element.nextElementSibling;
        const arrow = element.querySelector('.collapsible-arrow');
        content.style.display = (content.style.display === 'block') ? 'none' : 'block';
        arrow.classList.toggle('rotate');
    }
</script>

</body>
</html>
