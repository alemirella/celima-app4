<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->rol == 'administrador') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->rol == 'tecnico') {
                return redirect()->route('tecnico.produccion');
            }
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'empresa_nombre' => 'required|string|max:255|unique:empresas,nombre',
            'empresa_ruc' => 'required|string|min:11|max:11|unique:empresas,ruc',
            'empresa_direccion' => 'required|string|max:200|unique:empresas,direccion',
            'empresa_telefono' => 'required|string|max:10|unique:empresas,telefono',
            'usuario_nombre' => 'required|string|max:200|unique:users,usuario_nombre',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::transaction(function () use ($request) {
            $empresa = Empresa::create([
                'nombre' => $request->empresa_nombre,
                'ruc' => $request->empresa_ruc,
                'direccion' => $request->empresa_direccion,
                'telefono' => $request->empresa_telefono,
            ]);

            User::create([
                'usuario_nombre' => $request->usuario_nombre,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'empresa_id' => $empresa->id,
                'rol' => 'administrador',
            ]);
        });

        return redirect()->route('login.form')->with('success', 'Registro exitoso, ya puedes iniciar sesión.');
    }

        public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    
}
