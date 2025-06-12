@extends('layouts.tecnico')

@section('title', 'Mantenimiento')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 fw-bold text-tecnico">
        <i class="bi bi-wrench-adjustable-circle me-2"></i>
        Fallas Detectadas por Sensores
    </h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($fallas->isEmpty())
        <div class="alert alert-info">No hay fallas pendientes.</div>
    @else
        @foreach($fallas as $falla)
            <div class="card-custom mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="fw-bold text-tecnico mb-0">{{ $falla->titulo }}</h5>
                    <span class="badge bg-{{ $falla->estado === 'pendiente' ? 'warning' : 'success' }}">
                        {{ ucfirst($falla->estado) }}
                    </span>
                </div>
                <p class="mb-1"><strong>🔧 Sensor:</strong> {{ $falla->sensor->nombre }}</p>
                <p class="mb-1"><strong>🛠️ Máquina:</strong> {{ $falla->maquina->nombre }}</p>
                <p class="mb-1"><strong>🏭 Línea:</strong> {{ $falla->linea->nombre }}</p>
                <p class="mb-1"><strong>📝 Descripción:</strong> {{ $falla->descripcion }}</p>
                <p class="mb-3"><strong>📅 Fecha Reporte:</strong> {{ \Carbon\Carbon::parse($falla->fecha_reporte)->format('d/m/Y H:i') }}</p>

                @if($falla->estado === 'pendiente')
                    <form method="POST" action="{{ route('tecnico.resolverFalla', $falla->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-tecnico mt-2">
                            <i class="bi bi-check-circle me-1"></i> Marcar como resuelta
                        </button>
                    </form>
                @endif
            </div>
        @endforeach
    @endif

</div>
@endsection
