<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LineaProduccion;
use App\Models\Maquina;
use App\Models\Sensor;

class ProduccionController extends Controller
{
    public function index()
    {
        $empresaId = auth()->user()->empresa_id;

        $lineas = LineaProduccion::where('empresa_id', $empresaId)->with(['maquinas' => function ($query) {
            $query->with('sensores');
        }])->get();

        $sensores = Sensor::whereHas('maquina.linea', function($query) use ($empresaId) {
            $query->where('empresa_id', $empresaId);
        })->with('maquina')->get();

        return view('admin.produccion.index', compact('lineas', 'sensores'));
    }

    // ===============================
    // LINEAS DE PRODUCCIÓN
    // ===============================

    public function indexLineas()
    {
        $empresaId = auth()->user()->empresa_id;
        $lineas = LineaProduccion::where('empresa_id', $empresaId)->get();

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
        $empresaId = auth()->user()->empresa_id;
        $linea = LineaProduccion::where('empresa_id', $empresaId)->findOrFail($id);

        return view('admin.produccion.lineas.edit', compact('linea'));
    }

    public function updateLinea(Request $request, $id)
    {
        $empresaId = auth()->user()->empresa_id;
        $linea = LineaProduccion::where('empresa_id', $empresaId)->findOrFail($id);

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
        $empresaId = auth()->user()->empresa_id;
        $linea = LineaProduccion::where('empresa_id', $empresaId)->findOrFail($id);
        $linea->delete();

        return redirect()->route('produccion.lineas.index')->with('success', 'Línea eliminada correctamente.');
    }

    // ===============================
    // MAQUINAS
    // ===============================

    public function indexMaquinas()
    {
        $empresaId = auth()->user()->empresa_id;

        $maquinas = Maquina::whereHas('linea', function($query) use ($empresaId) {
            $query->where('empresa_id', $empresaId);
        })->get();

        $lineas = LineaProduccion::where('empresa_id', $empresaId)->withCount('maquinas')->get();

        // Verifica si hay al menos una línea que permita más máquinas
        $puedeRegistrarMaquina = $lineas->contains(function ($linea) {
            return is_null($linea->numero_maquinas) || $linea->maquinas_count < $linea->numero_maquinas;
        });

        return view('admin.produccion.maquinas.index', compact('maquinas', 'puedeRegistrarMaquina'));
    }


    public function createMaquina()
    {
        $empresaId = auth()->user()->empresa_id;
        $lineas = LineaProduccion::where('empresa_id', $empresaId)->get();

        return view('admin.produccion.maquinas.create', compact('lineas'));
    }

    public function storeMaquina(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'numero_serie' => 'required|string|unique:maquinas,numero_serie',
            'modelo' => 'required|string',
            'marca' => 'required|string',
            'ubicacion' => 'nullable|string',
            'estado' => 'required|in:activa,detenida,mantenimiento',
            'linea_id' => 'required|exists:lineas_produccion,id'
        ]);
    
        $linea = LineaProduccion::where('empresa_id', auth()->user()->empresa_id)->findOrFail($request->linea_id);
    
        // Validar cantidad máxima de máquinas
        $maquinasActuales = $linea->maquinas()->count();
        if ($linea->numero_maquinas !== null && $maquinasActuales >= $linea->numero_maquinas) {
            return redirect()->back()
                ->withErrors(['linea_id' => 'Esta línea ya alcanzó el número máximo de máquinas permitidas.'])
                ->withInput();
        }
    
        // Validar que la ubicación de la máquina coincida con la línea
        if ($request->filled('ubicacion') && $request->ubicacion !== $linea->ubicacion) {
            return redirect()->back()
                ->withErrors(['ubicacion' => 'La ubicación de la máquina debe coincidir con la ubicación de la línea.'])
                ->withInput();
        }
    
        // Usar la ubicación de la línea si no se ingresó
        $data = $request->all();
        if (!$request->filled('ubicacion')) {
            $data['ubicacion'] = $linea->ubicacion;
        }
    
        Maquina::create($data);
    
        return redirect()->route('produccion.maquinas.index')->with('success', 'Máquina registrada correctamente.');
    }
    

    public function editMaquina($id)
    {
        $empresaId = auth()->user()->empresa_id;
        $maquina = Maquina::whereHas('linea', function($query) use ($empresaId) {
            $query->where('empresa_id', $empresaId);
        })->findOrFail($id);

        $lineas = LineaProduccion::where('empresa_id', $empresaId)->get();

        return view('admin.produccion.maquinas.edit', compact('maquina', 'lineas'));
    }

    public function updateMaquina(Request $request, $id)
    {
        $empresaId = auth()->user()->empresa_id;
        $maquina = Maquina::whereHas('linea', function($query) use ($empresaId) {
            $query->where('empresa_id', $empresaId);
        })->findOrFail($id);

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
        $empresaId = auth()->user()->empresa_id;
        $maquina = Maquina::whereHas('linea', function($query) use ($empresaId) {
            $query->where('empresa_id', $empresaId);
        })->findOrFail($id);

        $maquina->delete();

        return redirect()->route('produccion.maquinas.index')->with('success', 'Máquina eliminada correctamente.');
    }

    // ===============================
    // SENSORES
    // ===============================

    public function indexSensores()
    {
        $empresaId = auth()->user()->empresa_id;

        $sensores = Sensor::whereHas('maquina.linea', function($query) use ($empresaId) {
            $query->where('empresa_id', $empresaId);
        })->get();

        return view('admin.produccion.sensores.index', compact('sensores'));
    }

    public function createSensor()
    {
        $empresaId = auth()->user()->empresa_id;

        $maquinas = Maquina::whereHas('linea', function ($query) use ($empresaId) {
            $query->where('empresa_id', $empresaId);
        })->get();

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

        $maquina = Maquina::whereHas('linea', function ($query) {
            $query->where('empresa_id', auth()->user()->empresa_id);
        })->findOrFail($request->maquina_id);

        Sensor::create($request->all());

        return redirect()->route('produccion.sensores.index')->with('success', 'Sensor registrado correctamente.');
    }

    public function editSensor($id)
    {
        $empresaId = auth()->user()->empresa_id;

        $sensor = Sensor::whereHas('maquina.linea', function ($query) use ($empresaId) {
            $query->where('empresa_id', $empresaId);
        })->findOrFail($id);

        $maquinas = Maquina::whereHas('linea', function ($query) use ($empresaId) {
            $query->where('empresa_id', $empresaId);
        })->get();

        return view('admin.produccion.sensores.edit', compact('sensor', 'maquinas'));
    }

    public function updateSensor(Request $request, $id)
    {
        $empresaId = auth()->user()->empresa_id;

        $sensor = Sensor::whereHas('maquina.linea', function ($query) use ($empresaId) {
            $query->where('empresa_id', $empresaId);
        })->findOrFail($id);

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
        $empresaId = auth()->user()->empresa_id;

        $sensor = Sensor::whereHas('maquina.linea', function ($query) use ($empresaId) {
            $query->where('empresa_id', $empresaId);
        })->findOrFail($id);

        $sensor->delete();

        return redirect()->route('produccion.sensores.index')->with('success', 'Sensor eliminado correctamente.');
    }
}