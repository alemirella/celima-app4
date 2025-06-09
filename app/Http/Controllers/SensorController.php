<?php
namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\Maquina;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    // Mostrar formulario para crear sensor
    public function create()
    {
        $maquinas = Maquina::all(); // para elegir máquina al crear sensor
        return view('sensores.create', compact('maquinas'));
    }

    // Guardar sensor
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'estado' => 'required|in:activo,inactivo',
            'maquina_id' => 'required|exists:maquinas,id',
        ]);

        Sensor::create([
            'nombre' => $request->nombre,
            'estado' => $request->estado,
            'maquina_id' => $request->maquina_id,
        ]);

        return redirect()->route('sensores.index')->with('success', 'Sensor registrado correctamente');
    }

    // Listar sensores
    public function index()
    {
        $sensores = Sensor::with('maquina')->get();
        return view('sensores.index', compact('sensores'));
    }
}
