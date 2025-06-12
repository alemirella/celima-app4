<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Falla;
use App\Models\Sensor;
use App\Models\Maquina;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Fallas por mes (últimos 6 meses)
        $fallasPorMes = Falla::selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Sensores con más fallas
        $fallasPorSensor = Falla::select('sensor_id', DB::raw('count(*) as total'))
            ->groupBy('sensor_id')
            ->with('sensor') // asegúrate que la relación esté definida en Falla
            ->orderByDesc('total')
            ->take(5)
            ->get();

        // Máquinas con más fallas
        $fallasPorMaquina = Falla::select('maquina_id', DB::raw('count(*) as total'))
            ->groupBy('maquina_id')
            ->with('maquina')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('fallasPorMes', 'fallasPorSensor', 'fallasPorMaquina'));
    }
}
