@extends('layouts.tecnico')

@section('title', 'Contacto')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <h2 class="mb-0">Contacto</h2>
    </div>
    <div class="card-body">
        <p class="lead">Comunicación con administradores o soporte.</p>

        <form>
            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea id="mensaje" class="form-control" rows="4" placeholder="Escribe tu mensaje aquí..."></textarea>
            </div>
            <button type="submit" class="btn btn-info text-white">Enviar</button>
        </form>
    </div>
</div>
@endsection
