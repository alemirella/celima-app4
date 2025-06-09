@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Registrar Nuevo Sensor</h2>

    <form action="{{ route('produccion.sensores.store') }}" method="POST" class="card p-4 shadow rounded border-0">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Tipo</label>
                <input type="text" name="tipo" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Unidad de Medida</label>
                <input type="text" name="unidad_medida" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Ubicación</label>
                <input type="text" name="ubicacion" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Estado</label>
                <select name="estado" class="form-select" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Máquina</label>
                <select name="maquina_id" class="form-select" required>
                    <option value="">Seleccione máquina</option>
                    @foreach($maquinas as $maquina)
                        <option value="{{ $maquina->id }}">{{ $maquina->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-4 text-end">
            <button class="btn btn-success">Registrar Sensor</button>
            <a href="{{ route('produccion.sensores.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
