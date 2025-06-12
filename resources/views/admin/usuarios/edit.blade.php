@extends('layouts.admin')

@section('title', 'Editar Técnico')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0 rounded">
        <div class="card-header bg-celima-primary text-white fw-semibold">
            <i class="bi bi-pencil-fill me-2"></i> Editar Técnico
        </div>
        <div class="card-body">
            <form action="{{ route('admin.usuarios.update', $tecnico->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre de Usuario</label>
                        <input type="text" name="usuario_nombre" class="form-control" value="{{ old('usuario_nombre', $tecnico->usuario_nombre) }}" required>
                        @error('usuario_nombre') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Correo Electrónico</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $tecnico->email) }}" required>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-secondary me-2">
                        <i class="bi bi-x-circle me-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i> Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
