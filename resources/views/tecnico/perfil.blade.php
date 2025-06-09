@extends('layouts.tecnico')

@section('title', 'Mi Perfil')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <h2 class="mb-0">Mi Perfil (Técnico)</h2>
    </div>
    <div class="card-body">
        <p class="lead">Datos personales del técnico.</p>

        <dl class="row">
            <dt class="col-sm-3">Nombre</dt>
            <dd class="col-sm-9">{{ auth()->user()->usuario_nombre ?? 'Técnico' }}</dd>

            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9">{{ auth()->user()->email ?? 'email@example.com' }}</dd>

            <dt class="col-sm-3">Rol</dt>
            <dd class="col-sm-9">Técnico</dd>
        </dl>

        <a href="#" class="btn btn-primary mt-3">Editar Perfil</a>
    </div>
</div>
@endsection
