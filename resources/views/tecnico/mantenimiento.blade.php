@extends('layouts.tecnico')

@section('content')
<div class="container mt-4">
    <h2>Fallas Detectadas por Sensores</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($fallas->isEmpty())
        <div class="alert alert-info">No hay fallas pendientes.</div>
    @else
        @foreach($fallas as $falla)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>{{ $falla->titulo }}</strong> - {{ ucfirst($falla->estado) }}
                </div>
                <div class="card-body">
                    <p><strong>Sensor:</strong> {{ $falla->sensor->nombre }}</p>
                    <p><strong>Máquina:</strong> {{ $falla->maquina->nombre }}</p>
                    <p><strong>Línea:</strong> {{ $falla->linea->nombre }}</p>
                    <p><strong>Descripción:</strong> {{ $falla->descripcion }}</p>
                    <p><strong>Fecha:</strong> {{ $falla->fecha_reporte }}</p>
                    <form method="POST" action="{{ route('tecnico.resolverFalla', $falla->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-success mt-2">Marcar como resuelta</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>

@endsection
