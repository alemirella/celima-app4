<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function produccion()
    {
        return view('tecnico.produccion');
    }

    public function mantenimiento()
    {
        return view('tecnico.mantenimiento');
    }

    public function resolverFalla($id)
    {
        // Lógica para resolver falla
        return back()->with('success', 'Falla resuelta correctamente.');
    }

    public function perfil()
    {
        return view('tecnico.perfil');
    }

    public function editarPerfil(Request $request)
    {
        // Lógica para editar perfil
        return back()->with('success', 'Perfil actualizado.');
    }

    public function contacto()
    {
        return view('tecnico.contacto');
    }
}
