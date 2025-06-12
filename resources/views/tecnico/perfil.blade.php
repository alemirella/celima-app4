@extends('layouts.tecnico')

@section('title', 'Mi Perfil')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 fw-bold text-tecnico">
        <i class="bi bi-person-circle me-2"></i> Perfil del Técnico
    </h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(request()->has('edit'))
        <div class="card-custom mb-4">
            <form action="{{ route('tecnico.perfil.editar') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre de usuario</label>
                        <input type="text" name="usuario_nombre" class="form-control" value="{{ old('usuario_nombre', $user->usuario_nombre) }}" required>
                        @error('usuario_nombre') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('tecnico.perfil') }}" class="btn btn-outline-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-tecnico">Guardar cambios</button>
                </div>
            </form>
        </div>
    @else
        <div class="card-custom mb-4">
            <table class="table mb-0">
                <tbody>
                    <tr>
                        <th scope="row" class="text-tecnico">👤 Usuario:</th>
                        <td>{{ $user->usuario_nombre }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-tecnico">📧 Correo:</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="{{ route('tecnico.perfil', ['edit' => '1']) }}" class="btn btn-tecnico">
            <i class="bi bi-pencil-fill me-1"></i> Editar
        </a>
    @endif
</div>
@endsection
