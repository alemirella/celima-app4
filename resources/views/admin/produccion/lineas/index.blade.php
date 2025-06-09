@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Líneas de Producción</h2>
    <a href="{{ route('produccion.lineas.create') }}" class="btn btn-success mb-3">Registrar Nueva Línea</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Ubicación</th>
                <th>N° Máquinas</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lineas as $linea)
            <tr>
                <td>{{ $linea->nombre }}</td>
                <td>{{ $linea->descripcion }}</td>
                <td>{{ $linea->ubicacion ?? '-' }}</td>
                <td>{{ $linea->numero_maquinas ?? '0' }}</td>
                <td><span class="badge bg-{{ $linea->estado === 'activa' ? 'success' : 'secondary' }}">{{ ucfirst($linea->estado) }}</span></td>
                <td>
                    <a href="{{ route('produccion.lineas.edit', $linea->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('produccion.lineas.destroy', $linea->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar esta línea?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
