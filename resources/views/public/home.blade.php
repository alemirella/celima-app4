@extends('layouts.app')
@section('title', 'Inicio - GestuM')
@section('content')

<div class="text-center py-3 fade-slide-up show">
    <h1 class="mb-4 display-5 fw-bold">
        Bienvenido a <span class="text-gradient">GestuM</span>
    </h1>

    <p class="lead mb-5 mx-auto" style="color: var(--celima-dark); max-width: 800px;">
        Plataforma moderna para la <strong>gestión integral de producción y mantenimiento</strong> en empresas industriales.
        Monitorea en tiempo real tus líneas de producción y máquinas mediante sensores inteligentes, 
        mejorando la eficiencia operativa y reduciendo tiempos de inactividad.
    </p>

    <div class="row justify-content-center g-4 px-md-5 px-3">
        {{-- Bloque 1 --}}
        <div class="col-md-5">
            <div class="card h-100 border-0 shadow-sm rounded-4 animate-fade-in">
                <div class="card-body">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-cpu-fill" style="font-size: 2.2rem;"></i>
                    </div>
                    <h5 class="fw-bold">Automatización Inteligente</h5>
                    <p class="mb-0">Análisis con sensores para prevenir fallas y optimizar el mantenimiento.</p>
                </div>
            </div>
        </div>

        {{-- Bloque 2 --}}
        <div class="col-md-5">
            <div class="card h-100 border-0 shadow-sm rounded-4 animate-fade-in">
                <div class="card-body">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-speedometer2" style="font-size: 2.2rem;"></i>
                    </div>
                    <h5 class="fw-bold">Panel Centralizado</h5>
                    <p class="mb-0">Métricas clave, alertas y estado del sistema desde cualquier dispositivo.</p>
                </div>
            </div>
        </div>

        {{-- Bloque 3 --}}
        <div class="col-md-5">
            <div class="card h-100 border-0 shadow-sm rounded-4 animate-fade-in">
                <div class="card-body">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-shield-lock-fill" style="font-size: 2.2rem;"></i>
                    </div>
                    <h5 class="fw-bold">Seguridad Avanzada</h5>
                    <p class="mb-0">Accesos controlados para proteger tu información crítica operativa.</p>
                </div>
            </div>
        </div>

        {{-- Bloque 4 --}}
        <div class="col-md-5">
            <div class="card h-100 border-0 shadow-sm rounded-4 animate-fade-in">
                <div class="card-body">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-box-seam" style="font-size: 2.2rem;"></i>
                    </div>
                    <h5 class="fw-bold">Gestión de Recursos</h5>
                    <p class="mb-0">Control de inventario, proveedores y activos desde un solo lugar.</p>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('register.form') }}" class="btn btn-lg mt-5 px-5 py-3 text-white shadow start-now-btn">
        Comenzar Ahora
    </a>
</div>

{{-- ESTILOS EXTRA --}}
<style>
    .text-gradient {
        background: linear-gradient(to right, var(--celima-dark), var(--celima-blue));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .animate-fade-in {
        animation: fadeSlideUp 0.6s ease-in-out both;
    }

    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .start-now-btn {
        background: linear-gradient(to right, var(--celima-dark), var(--celima-blue));
        border-radius: 2rem;
        transition: background 0.4s ease, transform 0.2s ease;
    }

    .start-now-btn:hover {
        background: linear-gradient(to right, var(--celima-blue), var(--celima-dark));
        transform: scale(1.03);
    }
</style>

@endsection
