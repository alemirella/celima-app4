<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\LineaProduccion;
use App\Models\Maquina;
use App\Models\ContactMessage;
use App\Models\Empresa;
use App\Models\Sensor;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function mantenimiento()
    {
        return view('admin.mantenimiento');
    }

    public function resolverFalla($id)
    {
        // Lógica para resolver falla
        return back()->with('success', 'Falla resuelta correctamente.');
    }


    public function asignarPermisos(Request $request)
    {
        // Lógica para asignar permisos a usuarios
        $request->validate([
            'usuario_nombre' => 'required|string|max:200|unique:users,usuario_nombre',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'usuario_nombre' => $request->usuario_nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'tecnico',
            'empresa_id' => auth()->user()->empresa_id,
        ]);

        return back()->with('success', 'Técnico creado exitosamente.');
    }

    public function editarTecnico(Request $request, $id)
    {
        $tecnico = User::where('rol', 'tecnico')->where('empresa_id', auth()->user()->empresa_id)->findOrFail($id);

        $request->validate([
            'usuario_nombre' => 'required|string|max:200|unique:users,usuario_nombre',
            'email' => 'required|email|unique:users,email,' . $tecnico->id,
        ]);

        $tecnico->update([
            'usuario_nombre' => $request->usuario_nombre,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Técnico actualizado correctamente.');
    }

    public function eliminarTecnico($id)
    {
        $tecnico = User::where('rol', 'tecnico')->where('empresa_id', auth()->user()->empresa_id)->findOrFail($id);
        $tecnico->delete();

        return back()->with('success', 'Técnico eliminado correctamente.');
    }

    public function usuarios()
    {
        $tecnicos = User::where('rol', 'tecnico')->where('empresa_id', auth()->user()->empresa_id)->get();
        return view('admin.usuarios', compact('tecnicos'));
    }
    
    public function perfil()
    {
        $user = Auth::user();
        $empresa = Empresa::find($user->empresa_id);

        return view('admin.perfil', compact('user', 'empresa'));
    }

    public function editarPerfil(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'usuario_nombre' => 'required|string|max:200|unique:users,usuario_nombre,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'empresa_nombre' => 'required|string|max:255|unique:empresas,nombre,' . $user->empresa_id,
            'empresa_ruc' => 'required|string|max:11|unique:empresas,ruc,' . $user->empresa_id,
            'empresa_telefono' => 'required|string|max:10|unique:empresas,telefono,' . $user->empresa_id,
            'empresa_direccion' => 'required|string|max:200|unique:empresas,direccion,' . $user->empresa_id,
        ]);

        $user = User::find($user->id); // asegúrate de tener instancia real del modelo

        $user->usuario_nombre = $request->usuario_nombre;
        $user->email = $request->email;
        $user->save();

        $empresa = Empresa::find($user->empresa_id);
        $empresa->nombre = $request->empresa_nombre;
        $empresa->ruc = $request->empresa_ruc;
        $empresa->telefono = $request->empresa_telefono;
        $empresa->direccion = $request->empresa_direccion;
        $empresa->save();

        return redirect()->route('admin.perfil')->with('success', 'Perfil actualizado correctamente.');
    }
    public function soporte()
    {
        return view('admin.soporte');
    }

    public function soporteSubmit(Request $request)
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
