@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Editar Máquina</h2>

    <form action="{{ route('produccion.maquinas.update', $maquina->id) }}" method="POST" class="card p-4 shadow rounded border-0">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $maquina->nombre }}" required>
            </div>

            <div class="col-md-6">
                <label>Número de Serie</label>
                <input type="text" name="numero_serie" class="form-control" value="{{ $maquina->numero_serie }}" required>
            </div>

            <div class="col-md-6">
                <label>Modelo</label>
                <input type="text" name="modelo" class="form-control" value="{{ $maquina->modelo }}" required>
            </div>

            <div class="col-md-6">
                <label>Marca</label>
                <input type="text" name="marca" class="form-control" value="{{ $maquina->marca }}" required>
            </div>

            <div class="col-md-6">
                <label>Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" value="{{ $maquina->ubicacion }}">
            </div>

            <div class="col-md-6">
                <label>Estado</label>
                <select name="estado" class="form-select" required>
                    <option value="activa" {{ $maquina->estado == 'activa' ? 'selected' : '' }}>Activa</option>
                    <option value="detenida" {{ $maquina->estado == 'detenida' ? 'selected' : '' }}>Detenida</option>
                    <option value="mantenimiento" {{ $maquina->estado == 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                </select>
            </div>

            <div class="col-md-12">
                <label>Línea de Producción</label>
                <select name="linea_id" class="form-select" required>
                    @foreach($lineas as $linea)
                        <option value="{{ $linea->id }}" {{ $maquina->linea_id == $linea->id ? 'selected' : '' }}>{{ $linea->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-4 text-end">
            <button class="btn btn-primary">Actualizar Máquina</button>
            <a href="{{ route('produccion.maquinas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection

