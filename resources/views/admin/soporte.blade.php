@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-gray-800">Soporte</h1>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.soporte.submit') }}" class="space-y-4 mt-4">
    @csrf

    <div>
        <label class="block text-sm font-medium">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', auth()->user()->usuario_nombre) }}"
               class="w-full border border-gray-300 rounded px-3 py-2 @error('nombre') border-red-500 @enderror">
        @error('nombre')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Correo</label>
        <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
               class="w-full border border-gray-300 rounded px-3 py-2 @error('email') border-red-500 @enderror">
        @error('email')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Mensaje</label>
        <textarea name="mensaje" rows="4"
                  class="w-full border border-gray-300 rounded px-3 py-2 @error('mensaje') border-red-500 @enderror">{{ old('mensaje') }}</textarea>
        @error('mensaje')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Enviar</button>
</form>
@endsection
