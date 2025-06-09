<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'numero_serie',
        'modelo',
        'marca',
        'ubicacion',
        'estado',
        'linea_id'
    ];

    // Relación con línea de producción
    public function linea()
    {
        return $this->belongsTo(LineaProduccion::class, 'linea_id');
    }

    // Relación con sensores (1 máquina tiene muchos sensores)
    public function sensores()
    {
        return $this->hasOne(Sensor::class, 'maquina_id');
    }
}

