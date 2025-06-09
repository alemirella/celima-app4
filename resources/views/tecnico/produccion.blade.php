@extends('layouts.tecnico')

@section('title', 'Producción')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h2 class="mb-0">Producción (Técnico)</h2>
    </div>
    <div class="card-body">
        <p class="lead">Estado en tiempo real de máquinas y líneas.</p>

        <!-- Aquí puedes agregar tablas, gráficos o información dinámica -->

        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Aquí se mostrará el estado actual de las máquinas.
        </div>
    </div>
</div>
@endsection
