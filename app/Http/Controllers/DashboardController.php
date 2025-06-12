<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Falla;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $empresaId = auth()->user()->empresa_id;

        // Fallas por mes (últimos 6 meses)
        $fallasPorMes = Falla::whereHas('linea', function ($query) use ($empresaId) {
                $query->where('empresa_id', $empresaId);
            })
            ->selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Sensores con más fallas (solo de la empresa)
        $fallasPorSensor = Falla::whereHas('linea', function ($query) use ($empresaId) {
                $query->where('empresa_id', $empresaId);
            })
            ->select('sensor_id', DB::raw('count(*) as total'))
            ->groupBy('sensor_id')
            ->with('sensor')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        // Máquinas con más fallas (solo de la empresa)
        $fallasPorMaquina = Falla::whereHas('linea', function ($query) use ($empresaId) {
                $query->where('empresa_id', $empresaId);
            })
            ->select('maquina_id', DB::raw('count(*) as total'))
            ->groupBy('maquina_id')
            ->with('maquina')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('fallasPorMes', 'fallasPorSensor', 'fallasPorMaquina'));
    }
}
