@extends('layouts.tecnico')

@section('title', 'Gestión de Mantenimiento')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">
        <h2 class="mb-0">Gestión de Mantenimiento</h2>
    </div>
    <div class="card-body">
        <p class="lead">Lista de fallas asignadas o generales.</p>

        <!-- Ejemplo de tabla con fallas -->
        <table class="table table-striped table-hover mt-3">
            <thead class="table-warning">
                <tr>
                    <th>#</th>
                    <th>Falla</th>
                    <th>Máquina</th>
                    <th>Fecha Reporte</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Sensor fuera de rango</td>
                    <td>Máquina A</td>
                    <td>2025-06-05</td>
                    <td><span class="badge bg-danger">Pendiente</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Motor con vibración</td>
                    <td>Máquina B</td>
                    <td>2025-06-04</td>
                    <td><span class="badge bg-success">Resuelto</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
