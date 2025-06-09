@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Registrar Nueva Línea de Producción</h2>

    <form action="{{ route('produccion.lineas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre *</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción *</label>
            <input type="text" class="form-control" name="descripcion" required>
        </div>
        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" name="ubicacion">
        </div>
        <div class="mb-3">
            <label for="numero_maquinas" class="form-label">Número de Máquinas</label>
            <input type="number" class="form-control" name="numero_maquinas">
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado *</label>
            <select name="estado" class="form-select" required>
                <option value="activa">Activa</option>
                <option value="inactiva">Inactiva</option>
            </select>
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('produccion.lineas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

