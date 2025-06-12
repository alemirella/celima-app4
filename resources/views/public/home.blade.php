@extends('layouts.app')
@section('title', 'Inicio - CelimaCore')
@section('content')
<div class="text-center py-5">
    <h1>Bienvenido a CelimaCore</h1>
    <p class="lead" style="color: var(--celima-dark); max-width: 600px; margin: 0 auto;">
        La plataforma moderna para la gestión automatizada de producción y mantenimiento en empresas industriales.
        Integra sensores inteligentes para monitorear en tiempo real el estado de tus líneas y máquinas, mejorando
        la eficiencia y calidad.
    </p>
    <a href="{{ route('register.form') }}" class="btn btn-primary btn-lg mt-4">Comenzar Ahora</a>
</div>
@endsection
