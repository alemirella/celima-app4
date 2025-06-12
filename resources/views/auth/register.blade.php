@extends('layouts.app')
@section('title', 'Registro de Empresa - CelimaCore')

@section('content')
<div class="container d-flex justify-content-center align-items-center mt-4 fade-slide-up show">
    <div class="card shadow border-0 rounded-4 p-4 animate-fade-in" style="width: 100%; max-width: 600px; background-color: #ffffff;">
        <h3 class="text-center mb-4 fw-bold text-gradient">Registro de Empresa</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="empresa_nombre" class="form-label fw-semibold">Nombre de la empresa</label>
                <input type="text" id="empresa_nombre" name="empresa_nombre" placeholder="Nombre de la empresa"
                       value="{{ old('empresa_nombre') }}"
                       class="form-control @error('empresa_nombre') is-invalid @enderror" autocomplete="off" autofocus>
                @error('empresa_nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="empresa_ruc" class="form-label fw-semibold">RUC</label>
                <input type="text" id="empresa_ruc" name="empresa_ruc" placeholder="RUC"
                       value="{{ old('empresa_ruc') }}"
                       class="form-control @error('empresa_ruc') is-invalid @enderror" autocomplete="off">
                @error('empresa_ruc')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="empresa_direccion" class="form-label fw-semibold">Dirección</label>
                <input type="text" id="empresa_direccion" name="empresa_direccion" placeholder="Dirección de la empresa"
                       value="{{ old('empresa_direccion') }}"
                       class="form-control @error('empresa_direccion') is-invalid @enderror" autocomplete="off">
                @error('empresa_direccion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="empresa_telefono" class="form-label fw-semibold">Teléfono</label>
                <input type="text" id="empresa_telefono" name="empresa_telefono" placeholder="Teléfono de la empresa"
                       value="{{ old('empresa_telefono') }}"
                       class="form-control @error('empresa_telefono') is-invalid @enderror" autocomplete="off">
                @error('empresa_telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Correo electrónico</label>
                <input type="email" id="email" name="email" placeholder="Correo de la empresa"
                       value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror" autocomplete="off">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="usuario_nombre" class="form-label fw-semibold">Nombre del administrador</label>
                <input type="text" id="usuario_nombre" name="usuario_nombre" placeholder="Nombre del administrador"
                       value="{{ old('usuario_nombre') }}"
                       class="form-control @error('usuario_nombre') is-invalid @enderror" autocomplete="off">
                @error('usuario_nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Contraseña"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-semibold">Confirmar contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña"
                       class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100 start-now-btn">Registrar empresa</button>
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
