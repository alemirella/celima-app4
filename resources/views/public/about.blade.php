@extends('layouts.app')
@section('title', 'Quiénes Somos - CelimaCore')

@section('content')

<div class="container py-3 fade-slide-up show">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-gradient">¿Quiénes Somos?</h1>
        <hr class="w-25 mx-auto" style="border-top: 3px solid var(--celima-blue);">
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow border-0 p-4 animate-fade-in" style="background-color: #ffffff; border-radius: 1.5rem;">
                <div class="card-body">
                    <p class="fs-6 mb-4" style="line-height: 1.8; color: var(--celima-dark);">
                        En <strong>CelimaCore</strong> somos un equipo apasionado por la innovación tecnológica aplicada a la industria.
                        Nuestra misión es centralizar y automatizar la gestión de producción y mantenimiento, proporcionando una plataforma
                        robusta que integra sensores para monitoreo en tiempo real.
                    </p>
                    <p class="fs-6" style="line-height: 1.8; color: var(--celima-dark);">
                        Buscamos transformar la forma en que las empresas industriales controlan sus procesos, mejorando la eficiencia,
                        seguridad y calidad con herramientas intuitivas, modernas y confiables. 
                    </p>

                    <div class="text-center mt-4">
                        <img src="{{ asset('img/equipo_celimacore.png') }}" alt="Equipo CelimaCore" class="img-fluid rounded-4 shadow-lg" style="max-height: 350px;">
                        <p class="mt-2 text-muted small fst-italic">Nuestro equipo en acción</p>
                    </div>
                </div>
            </div>
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
</style>

@endsection
