@extends('layouts.tecnico') {{-- Usa el layout del técnico --}}

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Panel de Producción - Técnico</h2>

    {{-- LÍNEAS DE PRODUCCIÓN --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Líneas de Producción
        </div>
        <div class="card-body">
            @if($lineas->isEmpty())
                <div class="alert alert-warning">No hay líneas registradas.</div>
            @else
                @foreach($lineas as $linea)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $linea->nombre }}</h5>
                            <p class="card-text">{{ $linea->descripcion }}</p>
                            <p class="card-text"><strong>Ubicación:</strong> {{ $linea->ubicacion ?? 'No especificada' }}</p>
                            <p class="card-text"><strong>Estado:</strong> {{ ucfirst($linea->estado) }}</p>

                            {{-- MÁQUINAS DE LA LÍNEA --}}
                            <h6 class="mt-4">Máquinas:</h6>
                            @php
                                $maquinas = $linea->maquinas;
                            @endphp

                            @if($maquinas->isEmpty())
                                <div class="alert alert-secondary">No hay máquinas registradas.</div>
                            @else
                                <div class="row">
                                    @foreach($maquinas as $maquina)
                                        <div class="col-md-6 mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6>{{ $maquina->nombre }}</h6>
                                                    <p><strong>Modelo:</strong> {{ $maquina->modelo }}</p>
                                                    <p><strong>Serie:</strong> {{ $maquina->numero_serie }}</p>
                                                    <p><strong>Estado:</strong> {{ ucfirst($maquina->estado) }}</p>
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
    </div>

    {{-- SENSORES --}}
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            Sensores
        </div>
        <div class="card-body">
            @if($sensores->isEmpty())
                <div class="alert alert-warning">No hay sensores registrados.</div>
            @else
                <div class="row">
                    @foreach($sensores as $sensor)
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h6>{{ $sensor->nombre }}</h6>
                                    <p><strong>Tipo:</strong> {{ $sensor->tipo }}</p>
                                    <p><strong>Unidad:</strong> {{ $sensor->unidad_medida }}</p>
                                    <p><strong>Estado:</strong> {{ ucfirst($sensor->estado) }}</p>
                                    <p><strong>Máquina:</strong> {{ $sensor->maquina->nombre ?? 'No asignada' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
