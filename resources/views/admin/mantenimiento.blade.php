@extends('layouts.admin')

@section('title', 'Mantenimiento - Fallas Detectadas')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">
            <i class="bi bi-exclamation-triangle-fill me-2 text-danger"></i>
            Fallas Detectadas por Sensores
        </h2>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark d-inline-flex align-items-center">
            <i class="bi bi-arrow-left-circle me-2"></i> Volver al Dashboard
        </a>
    </div>

    @if($fallas->isEmpty())
        <div class="alert alert-warning shadow-sm">
            <i class="bi bi-info-circle me-2"></i>
            No se han registrado fallas aún.
        </div>
    @else
        <div class="row g-4">
            @foreach($fallas as $falla)
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <strong class="text-dark">{{ $falla->titulo }}</strong>
                            <span class="badge bg-{{ 
                                $falla->estado === 'pendiente' ? 'warning' : 
                                ($falla->estado === 'resuelta' ? 'success' : 'secondary') }}">
                                {{ ucfirst($falla->estado) }}
                            </span>
                        </div>
                        <div class="card-body">
                            <p class="mb-1"><strong>📍 Sensor:</strong> {{ $falla->sensor->nombre ?? 'N/A' }}</p>
                            <p class="mb-1"><strong>🔧 Máquina:</strong> {{ $falla->maquina->nombre ?? 'N/A' }}</p>
                            <p class="mb-1"><strong>🏭 Línea:</strong> {{ $falla->linea->nombre ?? 'N/A' }}</p>
                            <p class="mb-1"><strong>📝 Descripción:</strong><br> {{ $falla->descripcion }}</p>
                            <p class="mb-0"><strong>📅 Fecha Reporte:</strong> {{ \Carbon\Carbon::parse($falla->fecha_reporte)->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
