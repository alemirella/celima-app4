<?php

// app/Console/Commands/SimularFallaSensor.php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Falla;
use App\Models\Sensor;
use Illuminate\Support\Carbon;

class SimularFallaSensor extends Command
{
    protected $signature = 'simulador:sensor-fallas';
    protected $description = 'Simula fallas detectadas por sensores';

    public function handle()
    {
        $sensores = Sensor::inRandomOrder()->limit(3)->get(); // simula 3 sensores aleatorios

        foreach ($sensores as $sensor) {
            $temperatura = rand(70, 120); // valores simulados
            if ($temperatura > 100) {
                Falla::create([
                    'sensor_id' => $sensor->id,
                    'linea_id' => $sensor->maquina->linea_id,
                    'maquina_id' => $sensor->maquina_id,
                    'titulo' => 'Sobrecalentamiento',
                    'descripcion' => "Temperatura alta: {$temperatura}°{$sensor->unidad_medida}",
                    'fecha_reporte' => Carbon::now(),
                    'estado' => 'pendiente',
                ]);
                $this->info("Falla registrada por sensor: {$sensor->nombre}");
            }
        }

        return 0;
    }
}

