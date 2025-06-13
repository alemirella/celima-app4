@extends('layouts.admin')

@section('title', 'Registrar Máquina')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0 rounded">
        <div class="card-header bg-celima-primary text-white">
            <h4 class="mb-0">Registrar Nueva Máquina</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('produccion.maquinas.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre *</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Número de Serie *</label>
                        <input type="text" name="numero_serie" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Modelo *</label>
                        <input type="text" name="modelo" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Marca *</label>
                        <input type="text" name="marca" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Ubicación</label>
                        <input type="text" name="ubicacion" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Estado *</label>
                        <select name="estado" class="form-select" required>
                            <option value="activa">Activa</option>
                            <option value="detenida">Detenida</option>
                            <option value="mantenimiento">Mantenimiento</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Línea de Producción *</label>
                        <select name="linea_id" class="form-select" required>
                            <option value="">Seleccione una línea</option>
                            @foreach($lineas as $linea)
                                <option value="{{ $linea->id }}">{{ $linea->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('produccion.maquinas.index') }}" class="btn btn-outline-secondary me-2">Cancelar</a>
                    <button class="btn btn-celima">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection