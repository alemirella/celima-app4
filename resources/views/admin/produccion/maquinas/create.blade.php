@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Registrar Nueva Máquina</h2>

    <form action="{{ route('produccion.maquinas.store') }}" method="POST" class="card p-4 shadow rounded border-0">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Número de Serie</label>
                <input type="text" name="numero_serie" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Modelo</label>
                <input type="text" name="modelo" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Marca</label>
                <input type="text" name="marca" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Ubicación</label>
                <input type="text" name="ubicacion" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Estado</label>
                <select name="estado" class="form-select" required>
                    <option value="activa">Activa</option>
                    <option value="detenida">Detenida</option>
                    <option value="mantenimiento">Mantenimiento</option>
                </select>
            </div>

            <div class="col-md-12">
                <label>Línea de Producción</label>
                <select name="linea_id" class="form-select" required>
                    <option value="">Seleccione línea</option>
                    @foreach($lineas as $linea)
                        <option value="{{ $linea->id }}">{{ $linea->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-4 text-end">
            <button class="btn btn-success">Registrar Máquina</button>
            <a href="{{ route('produccion.maquinas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
