@extends('layouts.admin')

@section('title', 'Editar Máquina')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0 rounded">
        <div class="card-header bg-celima-primary text-white">
            <h4 class="mb-0">Editar Máquina</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('produccion.maquinas.update', $maquina->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre *</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $maquina->nombre }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Número de Serie *</label>
                        <input type="text" name="numero_serie" class="form-control" value="{{ $maquina->numero_serie }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Modelo *</label>
                        <input type="text" name="modelo" class="form-control" value="{{ $maquina->modelo }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Marca *</label>
                        <input type="text" name="marca" class="form-control" value="{{ $maquina->marca }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Ubicación</label>
                        <input type="text" name="ubicacion" class="form-control" value="{{ $maquina->ubicacion }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Estado *</label>
                        <select name="estado" class="form-select" required>
                            <option value="activa" {{ $maquina->estado === 'activa' ? 'selected' : '' }}>Activa</option>
                            <option value="detenida" {{ $maquina->estado === 'detenida' ? 'selected' : '' }}>Detenida</option>
                            <option value="mantenimiento" {{ $maquina->estado === 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Línea de Producción *</label>
                        <select name="linea_id" class="form-select" required>
                            @foreach($lineas as $linea)
                                <option value="{{ $linea->id }}" {{ $maquina->linea_id == $linea->id ? 'selected' : '' }}>
                                    {{ $linea->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('produccion.maquinas.index') }}" class="btn btn-outline-secondary me-2">Cancelar</a>
                    <button class="btn btn-celima">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
