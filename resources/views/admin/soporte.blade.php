@extends('layouts.admin')

@section('title', 'Soporte Técnico')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-celima">
        <i class="bi bi-person-circle me-2"></i> Centro de Soporte
    </h2>
    <div class="card shadow-sm border-0 rounded">
        <div class="card-body">
            <p class="text-muted mb-4">
                Si tienes alguna duda, problema técnico o sugerencia, completa el siguiente formulario y nuestro equipo de soporte te contactará pronto.
            </p>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.soporte.submit') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                               value="{{ old('nombre', auth()->user()->usuario_nombre) }}" required>
                        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Correo Electrónico</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', auth()->user()->email) }}" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Mensaje</label>
                        <textarea name="mensaje" rows="4" class="form-control @error('mensaje') is-invalid @enderror" required>{{ old('mensaje') }}</textarea>
                        @error('mensaje') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-celima">
                        <i class="bi bi-envelope-paper-fill me-1"></i> Enviar Mensaje
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
