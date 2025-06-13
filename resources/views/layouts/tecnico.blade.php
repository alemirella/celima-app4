<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'GestuM - Técnico')</title>

    {{-- Bootstrap + Fuentes --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Diseño visual técnico --}}
    @include('layouts.designs.tecnico_design')
</head>
<body>

    <div class="d-flex" style="min-height: 100vh; overflow-x: hidden;">
        {{-- Sidebar Técnico --}}
        <aside class="sidebar p-3">
            <h4 class="text-white text-center mb-4" style="font-family: 'Segoe UI', sans-serif; font-weight: 800; font-size: 1.5rem; letter-spacing: -0.5px;">
            GestuM Técnico
            </h4>
            <nav class="nav flex-column">
                <a class="nav-link @if(request()->routeIs('tecnico.produccion')) active @endif" href="{{ route('tecnico.produccion') }}">
                    <i class="bi bi-gear-fill me-2"></i> Producción
                </a>
                <a class="nav-link @if(request()->routeIs('tecnico.mantenimiento')) active @endif" href="{{ route('tecnico.mantenimiento') }}">
                    <i class="bi bi-wrench-adjustable-circle me-2"></i> Mantenimiento
                </a>
                <a class="nav-link @if(request()->routeIs('tecnico.perfil')) active @endif" href="{{ route('tecnico.perfil') }}">
                    <i class="bi bi-person-circle me-2"></i> Mi Perfil
                </a>
                <a class="nav-link @if(request()->routeIs('tecnico.contacto')) active @endif" href="{{ route('tecnico.contacto') }}">
                    <i class="bi bi-envelope-fill me-2"></i> Contacto
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link text-white text-start w-100 p-0">
                        <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
                    </button>
                </form>
            </nav>
        </aside>

        {{-- Contenido principal --}}
        <div class="main-content flex-grow-1 d-flex flex-column">
            <header class="tecnico-navbar px-4 py-2 bg-white border-bottom d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Panel Técnico</span>
                <span class="text-muted small">{{ Auth::user()->name ?? 'Técnico' }}</span>
            </header>

            <main class="container my-4 flex-grow-1">
                @yield('content')
            </main>

            <footer class="mt-auto text-center py-3">
                &copy; {{ date('Y') }} <strong>GestuM</strong> — Panel Técnico
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
