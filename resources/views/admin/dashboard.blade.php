@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-gray-800">Dashboard de Calidad</h1>
<p class="text-gray-600 mb-2">Aquí se muestran estadísticas de fallas, tiempos de respuesta, etc.</p>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
    <div class="bg-indigo-100 p-4 rounded shadow">Fallas: 12</div>
    <div class="bg-green-100 p-4 rounded shadow">Tiempo promedio: 2.4s</div>
    <div class="bg-yellow-100 p-4 rounded shadow">Alertas activas: 3</div>
</div>
@endsection
