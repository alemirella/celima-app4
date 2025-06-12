@extends('layouts.app')
@section('title', 'Iniciar Sesión - CelimaCore')
@section('content')
<h1>Iniciar Sesión</h1>
<form method="POST" action="{{ route('login') }}" class="mt-4">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Correo</label>
        <input type="email" id="email" name="email" placeholder="Correo"
               value="{{ old('email') }}"
               class="form-control @error('email') is-invalid @enderror" autocomplete="off" autofocus>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Contraseña"
               class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Ingresar</button>
</form>
@endsection
