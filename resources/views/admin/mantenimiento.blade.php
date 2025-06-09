@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-gray-800">Gestión de Mantenimiento</h1>
<p class="text-gray-600 mb-2">Lista de fallas detectadas y su estado.</p>
<ul class="list-disc pl-5 text-gray-700 mt-4 space-y-1">
    <li>Sensor línea A - Estado: Pendiente</li>
    <li>Motor línea B - Estado: En reparación</li>
    <li>Valvula línea C - Estado: Revisado</li>
</ul>
@endsection
