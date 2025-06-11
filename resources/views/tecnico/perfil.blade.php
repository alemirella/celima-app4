@extends('layouts.tecnico') <!-- Usa tu layout principal -->

@section('content')
<div class="container">
    <h1>Perfil de Tecnico</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Si se está editando -->
    @if(request()->has('edit'))
        <form action="{{ route('tecnico.perfil.editar') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nombre de usuario</label>
                <input type="text" name="usuario_nombre" class="form-control" value="{{ old('usuario_nombre', $user->usuario_nombre) }}" required>
                @error('usuario_nombre') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Correo electrónico</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">Guardar cambios</button>
            <a href="{{ route('tecnico.perfil') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    @else
        <!-- Mostrar los datos sin edición -->
        <table class="table">
            <tr><th>Usuario:</th><td>{{ $user->usuario_nombre }}</td></tr>
            <tr><th>Correo:</th><td>{{ $user->email }}</td></tr>
        </table>
        <a href="{{ route('tecnico.perfil', ['edit' => '1']) }}" class="btn btn-primary">Editar</a>
    @endif
</div>
@endsection
