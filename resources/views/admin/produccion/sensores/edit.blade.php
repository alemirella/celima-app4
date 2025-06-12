@extends('layouts.admin')

@section('title', 'Editar Sensor')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0 rounded">
        <div class="card-header bg-celima-primary text-white">
            <h4 class="mb-0">Editar Sensor</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('produccion.sensores.update', $sensor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre *</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $sensor->nombre }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tipo *</label>
                        <input type="text" name="tipo" class="form-control" value="{{ $sensor->tipo }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Unidad de Medida *</label>
                        <input type="text" name="unidad_medida" class="form-control" value="{{ $sensor->unidad_medida }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Ubicación</label>
                        <input type="text" name="ubicacion" class="form-control" value="{{ $sensor->ubicacion }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Estado *</label>
                        <select name="estado" class="form-select" required>
                            <option value="activo" {{ $sensor->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ $sensor->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Máquina *</label>
                        <select name="maquina_id" class="form-select" required>
                            @foreach($maquinas as $maquina)
                                <option value="{{ $maquina->id }}" {{ $sensor->maquina_id == $maquina->id ? 'selected' : '' }}>
                                    {{ $maquina->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('produccion.sensores.index') }}" class="btn btn-outline-secondary me-2">Cancelar</a>
                    <button class="btn btn-celima">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
