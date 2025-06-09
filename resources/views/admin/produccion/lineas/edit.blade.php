@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Editar Línea de Producción</h2>

    <form action="{{ route('produccion.lineas.update', $linea->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre *</label>
            <input type="text" class="form-control" name="nombre" value="{{ $linea->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción *</label>
            <input type="text" class="form-control" name="descripcion" value="{{ $linea->descripcion }}" required>
        </div>
        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" name="ubicacion" value="{{ $linea->ubicacion }}">
        </div>
        <div class="mb-3">
            <label for="numero_maquinas" class="form-label">Número de Máquinas</label>
            <input type="number" class="form-control" name="numero_maquinas" value="{{ $linea->numero_maquinas }}">
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado *</label>
            <select name="estado" class="form-select" required>
                <option value="activa" {{ $linea->estado === 'activa' ? 'selected' : '' }}>Activa</option>
                <option value="inactiva" {{ $linea->estado === 'inactiva' ? 'selected' : '' }}>Inactiva</option>
            </select>
        </div>
        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('produccion.lineas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

