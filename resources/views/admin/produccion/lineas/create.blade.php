@extends('layouts.admin')

@section('title', 'Registrar Línea')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm rounded border-0">
        <div class="card-header bg-celima-primary">
            <h4 class="mb-0 text-white">Registrar Nueva Línea de Producción</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('produccion.lineas.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-box-seam"></i></span>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Descripción *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-text-left"></i></span>
                            <input type="text" class="form-control" name="descripcion" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Ubicación</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                            <input type="text" class="form-control" name="ubicacion">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Número de Máquinas</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-cpu"></i></span>
                            <input type="number" class="form-control" name="numero_maquinas">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Estado *</label>
                        <select name="estado" class="form-select" required>
                            <option value="activa">Activa</option>
                            <option value="inactiva">Inactiva</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('produccion.lineas.index') }}" class="btn btn-outline-secondary me-2">Cancelar</a>
                    <button class="btn btn-celima">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
