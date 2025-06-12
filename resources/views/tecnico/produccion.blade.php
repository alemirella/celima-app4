@extends('layouts.tecnico')

@section('title', 'Panel de Producción')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 fw-bold text-tecnico">
        <i class="bi bi-gear-fill me-2"></i>
        Panel de Producción
    </h2>

    {{-- LÍNEAS DE PRODUCCIÓN --}}
    <div class="card-custom mb-4">
        <h5 class="fw-bold mb-3 text-tecnico">
            <i class="bi bi-diagram-3-fill me-2"></i>Líneas de Producción
        </h5>

        @if($lineas->isEmpty())
            <div class="alert alert-warning">No hay líneas registradas.</div>
        @else
            @foreach($lineas as $linea)
                <div class="card mb-3 border shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-tecnico">{{ $linea->nombre }}</h5>
                        <p class="text-muted mb-1">{{ $linea->descripcion }}</p>
                        <p class="mb-1"><strong>📍 Ubicación:</strong> {{ $linea->ubicacion ?? 'No especificada' }}</p>
                        <p class="mb-0"><strong>🔧 Estado:</strong>
                            <span class="badge bg-{{ $linea->estado == 'activa' ? 'success' : 'secondary' }}">
                                {{ ucfirst($linea->estado) }}
                            </span>
                        </p>

                        {{-- Máquinas asociadas --}}
                        <h6 class="mt-4 text-decoration-underline">Máquinas:</h6>
                        @php $maquinas = $linea->maquinas; @endphp

                        @if($maquinas->isEmpty())
                            <div class="alert alert-secondary mt-2">No hay máquinas registradas.</div>
                        @else
                            <div class="row">
                                @foreach($maquinas as $maquina)
                                    <div class="col-md-4 mb-3">
                                        <div class="card border shadow-sm">
                                            <div class="card-body py-2 px-3">
                                                <h6 class="card-title mb-1 text-tecnico small">{{ $maquina->nombre }}</h6>
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

    {{-- SENSORES --}}
    <div class="card-custom mb-4">
        <h5 class="fw-bold mb-3 text-success">
            <i class="bi bi-toggles2 me-2"></i>Sensores
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
