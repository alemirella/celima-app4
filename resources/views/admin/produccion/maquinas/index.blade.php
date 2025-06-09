@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Gestión de Máquinas</h2>

    <a href="{{ route('produccion.maquinas.create') }}" class="btn btn-success mb-3">Registrar nueva máquina</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover shadow">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>N° Serie</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Línea</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($maquinas as $maquina)
            <tr>
                <td>{{ $maquina->nombre }}</td>
                <td>{{ $maquina->numero_serie }}</td>
                <td>{{ $maquina->modelo }}</td>
                <td>{{ $maquina->marca }}</td>
                <td>{{ $maquina->ubicacion ?? 'N/A' }}</td>
                <td>{{ ucfirst($maquina->estado) }}</td>
                <td>{{ $maquina->linea->nombre }}</td>
                <td>
                    <a href="{{ route('produccion.maquinas.edit', $maquina->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('produccion.maquinas.destroy', $maquina->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('¿Estás seguro de eliminar esta máquina?')">
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
