@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Gestión de Sensores</h2>

    <a href="{{ route('produccion.sensores.create') }}" class="btn btn-success mb-3">Registrar nuevo sensor</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover shadow">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Unidad</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Máquina</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sensores as $sensor)
            <tr>
                <td>{{ $sensor->nombre }}</td>
                <td>{{ $sensor->tipo }}</td>
                <td>{{ $sensor->unidad_medida }}</td>
                <td>{{ $sensor->ubicacion ?? 'N/A' }}</td>
                <td>{{ ucfirst($sensor->estado) }}</td>
                <td>{{ $sensor->maquina->nombre }}</td>
                <td>
                    <a href="{{ route('produccion.sensores.edit', $sensor->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('produccion.sensores.destroy', $sensor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este sensor?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
