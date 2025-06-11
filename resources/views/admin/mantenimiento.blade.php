{{-- resources/views/admin/mantenimiento/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Fallas Detectadas por Sensores</h2>

    @if($fallas->isEmpty())
        <div class="alert alert-info">No se han registrado fallas aún.</div>
    @else
        @foreach($fallas as $falla)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>{{ $falla->titulo }}</strong> - {{ $falla->estado }}
                </div>
                <div class="card-body">
                    <p><strong>Sensor:</strong> {{ $falla->sensor->nombre }}</p>
                    <p><strong>Máquina:</strong> {{ $falla->maquina->nombre }}</p>
                    <p><strong>Línea:</strong> {{ $falla->linea->nombre }}</p>
                    <p><strong>Descripción:</strong> {{ $falla->descripcion }}</p>
                    <p><strong>Fecha:</strong> {{ $falla->fecha_reporte }}</p>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
