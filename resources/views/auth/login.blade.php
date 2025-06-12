@extends('layouts.app')
@section('title', 'Iniciar Sesión - CelimaCore')

@section('content')
<div class="container d-flex justify-content-center align-items-center mt-5 fade-slide-up show">
    <div class="card shadow border-0 rounded-4 p-4 animate-fade-in" style="width: 100%; max-width: 480px; background-color: #ffffff;">
        <h3 class="text-center mb-4 fw-bold text-gradient">Iniciar Sesión</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Correo electrónico</label>
                <input type="email" id="email" name="email" placeholder="Tu correo"
                       value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror" autocomplete="off" autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label fw-semibold">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Tu contraseña"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 start-now-btn">Ingresar</button>
        </form>
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

    .start-now-btn {
        background: linear-gradient(to right, var(--celima-dark), var(--celima-blue));
        border-radius: 0.5rem;
        transition: background 0.4s ease, transform 0.2s ease;
        font-weight: 600;
    }

    .start-now-btn:hover {
        background: linear-gradient(to right, var(--celima-blue), var(--celima-dark));
        transform: scale(1.02);
        color: #fff;
    }
</style>
@endsection
