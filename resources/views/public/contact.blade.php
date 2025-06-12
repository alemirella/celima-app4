@extends('layouts.app')
@section('title', 'Contáctanos - CelimaCore')
@section('content')
<h1>Contáctanos</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form method="POST" action="{{ route('contact.submit') }}" class="mt-4">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Tu nombre"
               class="form-control @error('nombre') is-invalid @enderror" autocomplete="off">
        @error('nombre')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Tu correo"
               class="form-control @error('email') is-invalid @enderror" autocomplete="off">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="mensaje" class="form-label">Mensaje</label>
        <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje"
                  class="form-control @error('mensaje') is-invalid @enderror">{{ old('mensaje') }}</textarea>
        @error('mensaje')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection
