<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LineaProduccion;
use App\Models\Maquina;
use App\Models\Sensor;

class ProduccionController extends Controller
{
    /*public function index()
    {
        return view('admin.produccion.index');
    }*/

    public function index()
    {
        $lineas = LineaProduccion::with('maquinas')->get();
        $sensores = Sensor::with('maquina')->get();

        return view('admin.produccion.index', compact('lineas', 'sensores'));
    }


    // ===============================
    // LINEAS DE PRODUCCIÓN
    // ===============================

    public function indexLineas()
    {
        $lineas = LineaProduccion::all();
        return view('admin.produccion.lineas.index', compact('lineas'));
    }

    public function createLinea()
    {
        return view('admin.produccion.lineas.create');
    }

    public function storeLinea(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'ubicacion' => 'nullable|string',
            'numero_maquinas' => 'nullable|integer',
            'estado' => 'required|in:activa,inactiva',
        ]);

        LineaProduccion::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'numero_maquinas' => $request->numero_maquinas,
            'estado' => $request->estado,
            'empresa_id' => auth()->user()->empresa_id
        ]);

        return redirect()->route('produccion.lineas.index')->with('success', 'Línea registrada correctamente.');
    }

    public function editLinea($id)
    {
        $linea = LineaProduccion::findOrFail($id);
        return view('admin.produccion.lineas.edit', compact('linea'));
    }

    public function updateLinea(Request $request, $id)
    {
        $linea = LineaProduccion::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'ubicacion' => 'nullable|string',
            'numero_maquinas' => 'nullable|integer',
            'estado' => 'required|in:activa,inactiva',
        ]);

        $linea->update($request->all());

        return redirect()->route('produccion.lineas.index')->with('success', 'Línea actualizada correctamente.');
    }

    public function destroyLinea($id)
    {
        $linea = LineaProduccion::findOrFail($id);
        $linea->delete();

        return redirect()->route('produccion.lineas.index')->with('success', 'Línea eliminada correctamente.');
    }

    // ===============================
    // MAQUINAS
    // ===============================

    public function indexMaquinas()
    {
        $maquinas = Maquina::with('linea')->get();
        return view('admin.produccion.maquinas.index', compact('maquinas'));
    }

    public function createMaquina()
    {
        $lineas = LineaProduccion::all();
        return view('admin.produccion.maquinas.create', compact('lineas'));
    }

    public function storeMaquina(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'numero_serie' => 'required|string|unique:maquinas,numero_serie,',
            'modelo' => 'required|string',
            'marca' => 'required|string',
            'ubicacion' => 'nullable|string',
            'estado' => 'required|in:activa,detenida,mantenimiento',
            'linea_id' => 'required|exists:lineas_produccion,id'
        ]);

        Maquina::create($request->all());

        return redirect()->route('produccion.maquinas.index')->with('success', 'Máquina registrada correctamente.');
    }

    public function editMaquina($id)
    {
        $maquina = Maquina::findOrFail($id);
        $lineas = LineaProduccion::all();
        return view('admin.produccion.maquinas.edit', compact('maquina', 'lineas'));
    }

    public function updateMaquina(Request $request, $id)
    {
        $maquina = Maquina::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'numero_serie' => 'required|string|unique:maquinas,numero_serie,' . $id,
            'modelo' => 'required|string',
            'marca' => 'required|string',
            'ubicacion' => 'nullable|string',
            'estado' => 'required|in:activa,detenida,mantenimiento',
            'linea_id' => 'required|exists:lineas_produccion,id'
        ]);

        $maquina->update($request->all());

        return redirect()->route('produccion.maquinas.index')->with('success', 'Máquina actualizada correctamente.');
    }

    public function destroyMaquina($id)
    {
        $maquina = Maquina::findOrFail($id);
        $maquina->delete();

        return redirect()->route('produccion.maquinas.index')->with('success', 'Máquina eliminada correctamente.');
    }

    // ===============================
    // SENSORES
    // ===============================

    public function indexSensores()
    {
        $sensores = Sensor::with('maquina')->get();
        return view('admin.produccion.sensores.index', compact('sensores'));
    }

    public function createSensor()
    {
        $maquinas = Maquina::all();
        return view('admin.produccion.sensores.create', compact('maquinas'));
    }

    public function storeSensor(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'tipo' => 'required|string',
            'unidad_medida' => 'required|string',
            'ubicacion' => 'nullable|string',
            'estado' => 'required|in:activo,inactivo',
            'maquina_id' => 'required|exists:maquinas,id'
        ]);

        Sensor::create($request->all());

        return redirect()->route('produccion.sensores.index')->with('success', 'Sensor registrado correctamente.');
    }

    public function editSensor($id)
    {
        $sensor = Sensor::findOrFail($id);
        $maquinas = Maquina::all();
        return view('admin.produccion.sensores.edit', compact('sensor', 'maquinas'));
    }

    public function updateSensor(Request $request, $id)
    {
        $sensor = Sensor::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'tipo' => 'required|string',
            'unidad_medida' => 'required|string',
            'ubicacion' => 'nullable|string',
            'estado' => 'required|in:activo,inactivo',
            'maquina_id' => 'required|exists:maquinas,id'
        ]);

        $sensor->update($request->all());

        return redirect()->route('produccion.sensores.index')->with('success', 'Sensor actualizado correctamente.');
    }

    public function destroySensor($id)
    {
        $sensor = Sensor::findOrFail($id);
        $sensor->delete();

        return redirect()->route('produccion.sensores.index')->with('success', 'Sensor eliminado correctamente.');
    }
}
