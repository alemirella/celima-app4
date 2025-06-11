@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Resumen de Fallas</h2>

    <div class="row">
        <!-- Fallas por mes -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">Fallas por Mes</div>
                <div class="card-body">
                    <canvas id="fallasPorMes"></canvas>
                </div>
            </div>
        </div>

        <!-- Sensores con más fallas -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">Top 5 Sensores con Fallas</div>
                <div class="card-body">
                    <canvas id="fallasPorSensor"></canvas>
                </div>
            </div>
        </div>

        <!-- Máquinas con más fallas -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">Top 5 Máquinas con Fallas</div>
                <div class="card-body">
                    <canvas id="fallasPorMaquina"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const fallasPorMes = {
    labels: {!! json_encode($fallasPorMes->pluck('mes')->map(fn($m) => \Carbon\Carbon::create()->month($m)->format('F'))) !!},
    datasets: [{
        label: 'Fallas',
        data: {!! json_encode($fallasPorMes->pluck('total')) !!},
        backgroundColor: 'rgba(54, 162, 235, 0.6)'
    }]
};

const fallasPorSensor = {
    labels: {!! json_encode($fallasPorSensor->map(fn($s) => $s->sensor->nombre ?? 'N/A')) !!},
    datasets: [{
        label: 'Fallas',
        data: {!! json_encode($fallasPorSensor->pluck('total')) !!},
        backgroundColor: 'rgba(255, 99, 132, 0.6)'
    }]
};

const fallasPorMaquina = {
    labels: {!! json_encode($fallasPorMaquina->map(fn($m) => $m->maquina->nombre ?? 'N/A')) !!},
    datasets: [{
        label: 'Fallas',
        data: {!! json_encode($fallasPorMaquina->pluck('total')) !!},
        backgroundColor: 'rgba(255, 206, 86, 0.6)'
    }]
};

new Chart(document.getElementById('fallasPorMes'), { type: 'bar', data: fallasPorMes });
new Chart(document.getElementById('fallasPorSensor'), { type: 'bar', data: fallasPorSensor });
new Chart(document.getElementById('fallasPorMaquina'), { type: 'bar', data: fallasPorMaquina });
</script>
@endsection
