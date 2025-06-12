@extends('layouts.admin')

@section('title', 'Panel de Producción')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 fw-bold">
        <i class="bi bi-gear-fill me-2 text-primary"></i>
        Panel de Producción
    </h2>

    {{-- Tarjetas de acceso rápido --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card-custom text-center h-100">
                <i class="bi bi-diagram-3-fill fs-1 text-primary mb-3"></i>
                <h5 class="mb-2">Líneas de Producción</h5>
                <p class="text-muted">Gestiona las líneas activas, su ubicación y estado general.</p>
                <a href="{{ route('produccion.lineas.index') }}" class="btn btn-primary w-100">Ver Líneas</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-custom text-center h-100">
                <i class="bi bi-cpu-fill fs-1 text-warning mb-3"></i>
                <h5 class="mb-2">Máquinas</h5>
                <p class="text-muted">Administra las máquinas asignadas a cada línea.</p>
                <a href="{{ route('produccion.maquinas.index') }}" class="btn btn-warning text-white w-100">Ver Máquinas</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-custom text-center h-100">
                <i class="bi bi-toggles2 fs-1 text-success mb-3"></i>
                <h5 class="mb-2">Sensores</h5>
                <p class="text-muted">Controla los sensores conectados a las máquinas.</p>
                <a href="{{ route('produccion.sensores.index') }}" class="btn btn-success w-100">Ver Sensores</a>
            </div>
        </div>
    </div>

    {{-- Sección de Líneas de Producción --}}
    <div class="card-custom mb-4">
        <h5 class="fw-bold mb-3 text-primary">
            <i class="bi bi-diagram-3-fill me-2"></i>Líneas de Producción
        </h5>

        @if($lineas->isEmpty())
            <div class="alert alert-warning">No hay líneas registradas.</div>
        @else
            @foreach($lineas as $linea)
                <div class="card mb-3 border shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $linea->nombre }}</h5>
                        <p class="text-muted mb-1">{{ $linea->descripcion }}</p>
                        <p class="mb-1"><strong>📍 Ubicación:</strong> {{ $linea->ubicacion ?? 'No especificada' }}</p>
                        <p class="mb-0"><strong>🔧 Estado:</strong> 
                            <span class="badge bg-{{ $linea->estado == 'activa' ? 'success' : 'secondary' }}">
                                {{ ucfirst($linea->estado) }}
                            </span>
                        </p>

                        {{-- Máquinas asociadas a la línea --}}
                        <h6 class="mt-4 text-decoration-underline">Máquinas:</h6>
                        @php $maquinas = $linea->maquinas; @endphp

                        @if($maquinas->isEmpty())
                            <div class="alert alert-secondary mt-2">No hay máquinas registradas en esta línea.</div>
                        @else
                            <div class="row">
                                @foreach($maquinas as $maquina)
                                    <div class="col-md-4 mb-3">
                                        <div class="card border shadow-sm">
                                            <div class="card-body py-2 px-3">
                                                <h6 class="card-title mb-1 text-primary small">{{ $maquina->nombre }}</h6>
                                                <p class="mb-1 small"><strong>Modelo:</strong> {{ $maquina->modelo }}</p>
                                                <p class="mb-1 small"><strong>Serie:</strong> {{ $maquina->numero_serie }}</p>
                                                <p class="mb-0 small"><strong>Estado:</strong> 
                                                    <span class="badge bg-{{ $maquina->estado === 'activa' ? 'success' : ($maquina->estado === 'detenida' ? 'warning' : 'secondary') }}">
                                                        {{ ucfirst($maquina->estado) }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    {{-- Sección de Sensores --}}
    <div class="card-custom mb-4">
        <h5 class="fw-bold mb-3 text-success">
            <i class="bi bi-toggles2 me-2"></i>Sensores Activos
        </h5>

        @if($sensores->isEmpty())
            <div class="alert alert-warning">No hay sensores registrados.</div>
        @else
            <div class="row">
                @foreach($sensores as $sensor)
                    <div class="col-md-4 mb-3">
                        <div class="card border shadow-sm">
                            <div class="card-body py-2 px-3">
                                <h6 class="card-title mb-1 text-success small">{{ $sensor->nombre }}</h6>
                                <p class="mb-1 small"><strong>Tipo:</strong> {{ $sensor->tipo }}</p>
                                <p class="mb-1 small"><strong>Unidad:</strong> {{ $sensor->unidad_medida }}</p>
                                <p class="mb-1 small"><strong>Estado:</strong> 
                                    <span class="badge bg-{{ $sensor->estado === 'activo' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($sensor->estado) }}
                                    </span>
                                </p>
                                <p class="mb-0 small"><strong>Máquina:</strong> {{ $sensor->maquina->nombre ?? 'No asignada' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>
@endsection
