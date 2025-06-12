<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'CelimaCore - Admin')</title>

    {{-- Bootstrap y fuentes --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Diseño visual --}}
    @include('layouts.designs.admin_design')
</head>
<body>

    <div class="d-flex" style="min-height: 100vh; overflow-x: hidden;">
        {{-- Sidebar lateral --}}
        <aside class="sidebar bg-dark text-white p-3">
            <h4 class="text-white text-center mb-4 fw-bold">CelimaCore Admin</h4>
            <nav class="nav flex-column">
                <a class="nav-link text-white @if(request()->routeIs('admin.dashboard')) active @endif" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a class="nav-link text-white @if(request()->routeIs('admin.produccion.index')) active @endif" href="{{ route('admin.produccion.index') }}">
                    <i class="bi bi-gear-fill me-2"></i> Producción
                </a>
                <a class="nav-link text-white @if(request()->routeIs('admin.mantenimiento')) active @endif" href="{{ route('admin.mantenimiento') }}">
                    <i class="bi bi-tools me-2"></i> Mantenimiento
                </a>
                <a class="nav-link text-white @if(request()->routeIs('admin.usuarios.index')) active @endif" href="{{ route('admin.usuarios.index') }}">
                    <i class="bi bi-people-fill me-2"></i> Usuarios
                </a>
                <a class="nav-link text-white @if(request()->routeIs('admin.perfil')) active @endif" href="{{ route('admin.perfil') }}">
                    <i class="bi bi-person-circle me-2"></i> Perfil
                </a>
                <a class="nav-link text-white @if(request()->routeIs('admin.soporte')) active @endif" href="{{ route('admin.soporte') }}">
                    <i class="bi bi-life-preserver me-2"></i> Soporte
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit" class="nav-link text-white btn btn-link p-0 text-start w-100">
                        <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
                    </button>
                </form>
            </nav>
        </aside>

        {{-- Contenido principal --}}
        <div class="main-content flex-grow-1 d-flex flex-column">
            <header class="admin-navbar px-4 py-2 bg-white border-bottom d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Panel de Administración</span>
                <span class="text-muted small">{{ Auth::user()->name ?? 'Administrador' }}</span>
            </header>

            <main class="container my-4 flex-grow-1">
                @yield('content')
            </main>

            <footer class="mt-auto text-center py-3 text-white">
                &copy; {{ date('Y') }} <strong>CelimaCore</strong> — Panel de Administración
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
