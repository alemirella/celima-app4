<?php

// app/Models/Falla.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Falla extends Model
{
    use HasFactory;

    protected $fillable = [
        'sensor_id',
        'linea_id',
        'maquina_id',
        'titulo',
        'descripcion',
        'estado',
        'usuario_id',
        'fecha_reporte',
        'fecha_resolucion',
    ];


    public function linea()
    {
        return $this->belongsTo(LineaProduccion::class, 'linea_id');
    }

    public function sensor()
    {
        return $this->belongsTo(Sensor::class, 'sensor_id');
    }

    public function maquina()
    {
        return $this->belongsTo(Maquina::class, 'maquina_id');
    }

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}

