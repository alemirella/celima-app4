@extends('layouts.app')
@section('title', 'Quiénes Somos - GestuM')

@section('content')

<div class="container py-4 fade-slide-up show">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-gradient">¿Quiénes Somos?</h1>
        <hr class="w-25 mx-auto" style="border-top: 3px solid var(--celima-blue);">
        <p class="text-muted">Conectamos procesos, personas y tecnología en un mismo lugar.</p>
    </div>

    {{-- Presentación --}}
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 p-4 animate-fade-in bg-white rounded-4">
                <div class="card-body">
                    <p class="fs-5 mb-4" style="line-height: 1.8; color: var(--celima-dark);">
                        En <strong>GestuM</strong>, somos un equipo apasionado por la transformación digital aplicada al sector industrial.
                        Desarrollamos soluciones que permiten monitorear y gestionar procesos de producción y mantenimiento de forma eficiente,
                        integrando tecnologías como sensores en tiempo real, interfaces intuitivas y análisis de datos.
                    </p>
                    <p class="fs-5 mb-0" style="line-height: 1.8; color: var(--celima-dark);">
                        Nuestro propósito es brindar herramientas robustas, modernas y seguras que impulsen la competitividad y sostenibilidad
                        de las empresas industriales.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Misión - Visión --}}
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-bullseye text-primary fs-2 me-3"></i>
                    <h5 class="mb-0 fw-bold">Nuestra Misión</h5>
                </div>
                <p class="fs-6 text-muted" style="line-height: 1.7;">
                    Desarrollar soluciones digitales que simplifiquen la gestión operativa de empresas industriales, mejorando su eficiencia,
                    seguridad y toma de decisiones mediante tecnología accesible.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-eye-fill text-primary fs-2 me-3"></i>
                    <h5 class="mb-0 fw-bold">Nuestra Visión</h5>
                </div>
                <p class="fs-6 text-muted" style="line-height: 1.7;">
                    Ser referentes en transformación digital industrial en Latinoamérica, liderando con innovación y ayudando a empresas a adaptarse
                    al futuro productivo a través de plataformas inteligentes.
                </p>
            </div>
        </div>
    </div>

    {{-- Valores --}}
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10">
            <div class="card border-0 shadow rounded-4 p-4">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-stars text-success fs-2 me-2"></i>
                    <h5 class="fw-bold mb-0">Nuestros Valores</h5>
                </div>
                <ul class="list-unstyled fs-6 text-muted ps-3 pt-2">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> <strong>Innovación:</strong> Aplicamos creatividad y tecnología en cada solución.</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> <strong>Compromiso:</strong> Damos lo mejor para cumplir con nuestros clientes.</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> <strong>Transparencia:</strong> Comunicamos con claridad y responsabilidad.</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> <strong>Colaboración:</strong> Trabajamos como un solo equipo con nuestros aliados.</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i> <strong>Excelencia:</strong> Nos esforzamos por ofrecer calidad en cada detalle.</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Imagen del equipo --}}
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <img src="{{ asset('img/equipo_GestuM.png') }}" alt="Equipo GestuM" class="img-fluid rounded-4 shadow-lg" style="max-height: 350px;">
            <p class="mt-3 text-muted small fst-italic">El equipo que hace posible GestuM</p>
        </div>
    </div>
</div>

{{-- Estilos locales --}}
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
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card h5 {
        color: var(--celima-dark);
    }

    .card p, .card ul {
        font-size: 0.97rem;
    }
</style>

@endsection
