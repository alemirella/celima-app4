@extends('layouts.admin')

@section('title', 'Gestión de Sensores')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-celima">Sensores Registrados</h2>
        <a href="{{ route('admin.produccion.index') }}" class="btn btn-outline-celima d-flex align-items-center">
            <i class="bi bi-arrow-left-circle me-2"></i> Volver al Panel
        </a>
        <a href="{{ route('produccion.sensores.create') }}" class="btn btn-celima">
            <i class="bi bi-plus-circle me-1"></i> Registrar nuevo sensor
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
                            <th>Tipo</th>
                            <th>Unidad</th>
                            <th>Ubicación</th>
                            <th>Estado</th>
                            <th>Máquina</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sensores as $sensor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sensor->nombre }}</td>
                            <td>{{ $sensor->tipo }}</td>
                            <td>{{ $sensor->unidad_medida }}</td>
                            <td>{{ $sensor->ubicacion ?? '—' }}</td>
                            <td>
                                <span class="badge bg-{{ $sensor->estado == 'activo' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($sensor->estado) }}
                                </span>
                            </td>
                            <td>{{ $sensor->maquina->nombre ?? '—' }}</td>
                            <td class="text-end">
                                <a href="{{ route('produccion.sensores.edit', $sensor->id) }}" class="btn btn-outline-celima btn-sm me-2">
                                    <i class="bi bi-pencil-fill me-1"></i> Editar
                                </a>
                                <form action="{{ route('produccion.sensores.destroy', $sensor->id) }}" method="POST" class="d-inline-block"
                                      onsubmit="return confirm('¿Eliminar este sensor?')">
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
                            <td colspan="7" class="text-center text-muted py-4">No hay sensores registrados.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
