@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-gray-800">Gestión de Usuarios</h1>
<p class="text-gray-600 mb-6">Registrar, asignar y revocar permisos a técnicos.</p>

{{-- Mostrar mensajes de éxito o error --}}
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Formulario para registrar técnicos --}}
<div class="bg-white p-6 rounded shadow-md mb-8">
    <h2 class="text-lg font-semibold mb-4 text-gray-700">Registrar nuevo técnico</h2>
    <form method="POST" action="{{ route('admin.usuarios.asignar') }}">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="usuario_nombre" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Correo</label>
                <input type="email" name="email" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Registrar Técnico</button>
        </div>
    </form>
</div>

{{-- Tabla de técnicos existentes --}}
<table class="min-w-full bg-white rounded shadow">
    <thead class="bg-indigo-200">
        <tr>
            <th class="text-left py-2 px-4">Nombre</th>
            <th class="text-left py-2 px-4">Correo</th>
            <th class="text-left py-2 px-4">Rol</th>
            <th class="text-left py-2 px-4">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tecnicos as $tecnico)
        <tr class="border-t">
            <td class="py-2 px-4">{{ $tecnico->usuario_nombre }}</td>
            <td class="py-2 px-4">{{ $tecnico->email }}</td>
            <td class="py-2 px-4 capitalize">{{ $tecnico->rol }}</td>
            <td class="py-2 px-4">
                <button onclick="openEditModal({{ $tecnico->id }}, '{{ $tecnico->usuario_nombre}}', '{{ $tecnico->email }}')" class="text-blue-600 hover:underline">Editar</button>

                <form method="POST" action="{{ route('admin.usuarios.eliminar', $tecnico->id) }}" class="inline-block ml-2" onsubmit="return confirm('¿Estás seguro de eliminar este técnico?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center py-4 text-gray-500">No hay técnicos registrados.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{-- Modal de edición --}}
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
    <div class="bg-white p-6 rounded w-full max-w-md shadow">
        <h2 class="text-lg font-semibold mb-4">Editar Técnico</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="usuario_nombre" id="editName" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Correo</label>
                <input type="email" name="email" id="editEmail" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeEditModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, name, email) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editName').value = name;
        document.getElementById('editEmail').value = email;
        document.getElementById('editForm').action = `/admin/usuarios/editar/${id}`;
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
@endsection
