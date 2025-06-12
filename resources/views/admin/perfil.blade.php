@extends('layouts.admin')

@section('title', 'Perfil de Administrador')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-celima">
        <i class="bi bi-person-circle me-2"></i> Perfil del Administrador
    </h2>
    <div class="card shadow-sm border-0 rounded">
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(request()->has('edit'))
                <form action="{{ route('admin.perfil.editar') }}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre de Usuario</label>
                            <input type="text" name="usuario_nombre" class="form-control" value="{{ old('usuario_nombre', $user->usuario_nombre) }}" required>
                            @error('usuario_nombre') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Dirección de la Empresa</label>
                            <input type="text" name="empresa_direccion" class="form-control" value="{{ old('empresa_direccion', $empresa->direccion) }}" required>
                            @error('empresa_direccion') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="empresa_telefono" class="form-control" value="{{ old('empresa_telefono', $empresa->telefono) }}" required>
                            @error('empresa_telefono') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nombre de la Empresa</label>
                            <input type="text" name="empresa_nombre" class="form-control" value="{{ old('empresa_nombre', $empresa->nombre) }}" required>
                            @error('empresa_nombre') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">RUC de la Empresa</label>
                            <input type="text" name="empresa_ruc" class="form-control" value="{{ old('empresa_ruc', $empresa->ruc) }}" required>
                            @error('empresa_ruc') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('admin.perfil') }}" class="btn btn-outline-secondary me-2">
                            <i class="bi bi-x-circle me-1"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-celima">
                            <i class="bi bi-save2 me-1"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            @else
                <table class="table table-striped">
                    <tr>
                        <th>Nombre de Usuario:</th>
                        <td>{{ $user->usuario_nombre }}</td>
                    </tr>
                    <tr>
                        <th>Correo Electrónico:</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Nombre de la Empresa:</th>
                        <td>{{ $empresa->nombre }}</td>
                    </tr>
                    <tr>
                        <th>RUC:</th>
                        <td>{{ $empresa->ruc }}</td>
                    </tr>
                    <tr>
                        <th>Dirección:</th>
                        <td>{{ $empresa->direccion }}</td>
                    </tr>
                    <tr>
                        <th>Teléfono:</th>
                        <td>{{ $empresa->telefono }}</td>
                    </tr>
                </table>

                <div class="text-end">
                    <a href="{{ route('admin.perfil', ['edit' => '1']) }}" class="btn btn-outline-celima">
                        <i class="bi bi-pencil-square me-1"></i> Editar Perfil
                    </a>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
