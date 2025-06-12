@extends('layouts.admin')

@section('title', 'Editar Línea')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm rounded border-0">
        <div class="card-header bg-celima-primary">
            <h4 class="mb-0 text-white">Editar Línea de Producción</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('produccion.lineas.update', $linea->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-box-seam"></i></span>
                            <input type="text" class="form-control" name="nombre" value="{{ $linea->nombre }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Descripción *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-text-left"></i></span>
                            <input type="text" class="form-control" name="descripcion" value="{{ $linea->descripcion }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Ubicación</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                            <input type="text" class="form-control" name="ubicacion" value="{{ $linea->ubicacion }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Número de Máquinas</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-cpu"></i></span>
                            <input type="number" class="form-control" name="numero_maquinas" value="{{ $linea->numero_maquinas }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Estado *</label>
                        <select name="estado" class="form-select" required>
                            <option value="activa" {{ $linea->estado === 'activa' ? 'selected' : '' }}>Activa</option>
                            <option value="inactiva" {{ $linea->estado === 'inactiva' ? 'selected' : '' }}>Inactiva</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('produccion.lineas.index') }}" class="btn btn-outline-secondary me-2">Cancelar</a>
                    <button class="btn btn-celima">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
