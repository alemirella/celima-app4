<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LineaProduccion;
use App\Models\Sensor;
use App\Models\User;
use App\Models\Empresa;
use App\Models\ContactMessage;


class TecnicoController extends Controller
{
    public function produccion()
    {
        $lineas = LineaProduccion::with('maquinas')->get();
        $sensores = Sensor::with('maquina')->get();

        return view('tecnico.produccion', compact('lineas', 'sensores'));
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
        $user = Auth::user();
        $empresa = Empresa::find($user->empresa_id);

        return view('tecnico.perfil', compact('user', 'empresa'));
    }

    public function editarPerfil(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'usuario_nombre' => 'required|string|max:200|unique:users,usuario_nombre,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user = User::find($user->id); // asegúrate de tener instancia real del modelo

        $user->usuario_nombre = $request->usuario_nombre;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('tecnico.perfil')->with('success', 'Perfil actualizado correctamente.');
    }


    public function contacto()
    {
        return view('tecnico.contacto');
    }

    public function submitContacto(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'mensaje' => 'required|string',
        ]);

        ContactMessage::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'mensaje' => $request->mensaje,
        ]);

        return back()->with('success', 'Mensaje enviado correctamente.');
    }
}
