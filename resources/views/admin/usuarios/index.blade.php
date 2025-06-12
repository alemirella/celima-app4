@extends('layouts.admin')

@section('title', 'Gestión de Técnicos')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-celima">
            <i class="bi bi-people-fill me-2"></i> Técnicos Registrados
        </h2>
        <a href="{{ route('admin.usuarios.form') }}" class="btn btn-celima d-flex align-items-center">
            <i class="bi bi-plus-circle me-1"></i> Agregar Técnico
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tecnicos as $tecnico)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tecnico->usuario_nombre }}</td>
                                <td>{{ $tecnico->email }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.usuarios.edit', $tecnico->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                        <i class="bi bi-pencil-square me-1"></i> Editar
                                    </a>
                                    <form action="{{ route('admin.usuarios.destroy', $tecnico->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este técnico?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash-fill me-1"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">No hay técnicos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
