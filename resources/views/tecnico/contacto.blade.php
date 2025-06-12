@extends('layouts.tecnico')

@section('title', 'Contacto')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-4 text-tecnico">
        <i class="bi bi-envelope-fill me-2"></i> Contacto con Soporte
    </h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card-custom">
        <form method="POST" action="{{ route('tecnico.contacto.submit') }}">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                           value="{{ old('nombre', auth()->user()->usuario_nombre) }}" required>
                    @error('nombre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email', auth()->user()->email) }}" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Mensaje</label>
                    <textarea name="mensaje" rows="4" class="form-control @error('mensaje') is-invalid @enderror" required>{{ old('mensaje') }}</textarea>
                    @error('mensaje')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-tecnico">
                    <i class="bi bi-send-fill me-1"></i> Enviar Mensaje
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
