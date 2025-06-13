@extends('layouts.app')
@section('title', 'Contáctanos - GestuM')

@section('content')
<div class="container py-3 fade-slide-up show">
    <div class="text-center mb-4">
        <h1 class="display-5 fw-bold text-gradient">Contáctanos</h1>
        <p class="text-muted">¿Tienes dudas o sugerencias? Escríbenos, estaremos encantados de ayudarte.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0 p-4 animate-fade-in" style="border-radius: 1.5rem; background-color: #ffffff;">
                <form method="POST" action="{{ route('contact.submit') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-semibold">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Tu nombre"
                               class="form-control @error('nombre') is-invalid @enderror" autocomplete="off">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Tu correo"
                               class="form-control @error('email') is-invalid @enderror" autocomplete="off">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="mensaje" class="form-label fw-semibold">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje"
                                  class="form-control @error('mensaje') is-invalid @enderror">{{ old('mensaje') }}</textarea>
                        @error('mensaje')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5 py-2 shadow start-now-btn">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Estilos adicionales locales --}}
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
