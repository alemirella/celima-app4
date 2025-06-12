@extends('layouts.admin')

@section('title', 'Gestión de Máquinas')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-celima">Máquinas Registradas</h2>
        <a href="{{ route('admin.produccion.index') }}" class="btn btn-outline-celima d-flex align-items-center">
            <i class="bi bi-arrow-left-circle me-2"></i> Volver al Panel
        </a>
        <a href="{{ route('produccion.maquinas.create') }}" class="btn btn-celima">
            <i class="bi bi-plus-circle me-1"></i> Registrar Nueva Máquina
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
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
                            <th>Nombre</th>
                            <th>Serie</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Ubicación</th>
                            <th>Estado</th>
                            <th>Línea</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($maquinas as $maquina)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $maquina->nombre }}</td>
                            <td>{{ $maquina->numero_serie }}</td>
                            <td>{{ $maquina->modelo }}</td>
                            <td>{{ $maquina->marca }}</td>
                            <td>{{ $maquina->ubicacion ?? '—' }}</td>
                            <td>
                                <span class="badge bg-{{ $maquina->estado === 'activa' ? 'success' : ($maquina->estado === 'mantenimiento' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($maquina->estado) }}
                                </span>
                            </td>
                            <td>{{ $maquina->linea->nombre ?? '—' }}</td>
                            <td class="text-end">
                                <a href="{{ route('produccion.maquinas.edit', $maquina->id) }}" class="btn btn-outline-celima btn-sm me-2">
                                    <i class="bi bi-pencil-fill me-1"></i> Editar
                                </a>
                                <form action="{{ route('produccion.maquinas.destroy', $maquina->id) }}" method="POST" class="d-inline-block"
                                      onsubmit="return confirm('¿Estás seguro de eliminar esta máquina?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash-fill me-1"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">No hay máquinas registradas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
