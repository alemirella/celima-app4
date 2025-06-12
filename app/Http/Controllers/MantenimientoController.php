<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Falla;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MantenimientoController extends Controller
{
    public function indexAdmin()
    {
        $empresaId = auth()->user()->empresa_id;

        $fallas = Falla::with(['sensor', 'linea', 'maquina'])
            ->whereHas('linea', function ($query) use ($empresaId) {
                $query->where('empresa_id', $empresaId);
            })
            ->latest()
            ->get();

        return view('admin.mantenimiento', compact('fallas'));
    }

    public function indexTecnico()
    {
        $empresaId = auth()->user()->empresa_id;

        $fallas = Falla::with(['sensor', 'linea', 'maquina'])
            ->where('estado', 'pendiente')
            ->whereHas('linea', function ($query) use ($empresaId) {
                $query->where('empresa_id', $empresaId);
            })
            ->orderByDesc('fecha_reporte')
            ->get();

        return view('tecnico.mantenimiento', compact('fallas'));
    }

    public function resolverFalla(Request $request, $id)
    {
        $falla = Falla::findOrFail($id);

        $falla->estado = 'resuelta';
        $falla->usuario_id = auth()->id(); // técnico que resolvió
        $falla->fecha_resolucion = Carbon::now();
        $falla->save();

        return redirect()->back()->with('success', 'Falla marcada como resuelta.');
    }
}
