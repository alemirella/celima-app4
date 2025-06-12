@extends('layouts.admin')

@section('title', 'Dashboard - CelimaCore Admin')

@section('content')
<div class="container-fluid py-4">
    <h2 class="text-center fw-bold mb-5" style="color: var(--celima-admin-dark); font-size: 2rem;">
        Resumen General de Fallas
    </h2>

    <div class="row g-4">
        <!-- Gráfico: Fallas por Mes -->
        <div class="col-lg-6">
            <div class="card card-custom h-100 shadow-sm">
                <div class="card-header bg-white border-bottom fw-semibold text-uppercase" style="color: var(--celima-admin-dark); font-size: 1.05rem;">
                    Fallas por Mes
                </div>
                <div class="card-body">
                    <canvas id="fallasPorMes"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfico: Sensores con más fallas -->
        <div class="col-lg-6">
            <div class="card card-custom h-100 shadow-sm">
                <div class="card-header bg-white border-bottom fw-semibold text-uppercase" style="color: var(--celima-admin-dark); font-size: 1.05rem;">
                    Top 5 Sensores con Fallas
                </div>
                <div class="card-body">
                    <canvas id="fallasPorSensor"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfico: Máquinas con más fallas -->
        <div class="col-12">
            <div class="card card-custom shadow-sm">
                <div class="card-header bg-white border-bottom fw-semibold text-uppercase" style="color: var(--celima-admin-dark); font-size: 1.05rem;">
                    Top 5 Máquinas con Fallas
                </div>
                <div class="card-body">
                    <canvas id="fallasPorMaquina"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script>
    // Datos desde el backend
    const fallasPorMes = {
        labels: {!! json_encode($fallasPorMes->pluck('mes')->map(fn($m) => \Carbon\Carbon::create()->month($m)->translatedFormat('F'))) !!},
        datasets: [{
            label: 'Fallas',
            data: {!! json_encode($fallasPorMes->pluck('total')) !!},
            backgroundColor: 'rgba(0, 166, 196, 0.6)',
            borderColor: 'rgba(0, 166, 196, 1)',
            borderWidth: 2,
            borderRadius: 5
        }]
    };

    const fallasPorSensor = {
        labels: {!! json_encode($fallasPorSensor->map(fn($s) => $s->sensor->nombre ?? 'N/A')) !!},
        datasets: [{
            label: 'Fallas',
            data: {!! json_encode($fallasPorSensor->pluck('total')) !!},
            backgroundColor: 'rgba(255, 99, 132, 0.6)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 2,
            borderRadius: 5
        }]
    };

    const fallasPorMaquina = {
        labels: {!! json_encode($fallasPorMaquina->map(fn($m) => $m->maquina->nombre ?? 'N/A')) !!},
        datasets: [{
            label: 'Fallas',
            data: {!! json_encode($fallasPorMaquina->pluck('total')) !!},
            backgroundColor: 'rgba(255, 206, 86, 0.6)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 2,
            borderRadius: 5
        }]
    };

    // Opciones generales
    const chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
            duration: 900,
            easing: 'easeOutQuart'
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        }
    };

    // Renderizar gráficos
    new Chart(document.getElementById('fallasPorMes'), { type: 'bar', data: fallasPorMes, options: chartOptions });
    new Chart(document.getElementById('fallasPorSensor'), { type: 'bar', data: fallasPorSensor, options: chartOptions });
    new Chart(document.getElementById('fallasPorMaquina'), { type: 'bar', data: fallasPorMaquina, options: chartOptions });
</script>
@endsection
