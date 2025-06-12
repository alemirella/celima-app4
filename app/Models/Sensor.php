<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;
    protected $table = 'sensores';

    protected $fillable = [
        'nombre',
        'tipo',
        'unidad_medida',
        'ubicacion',
        'estado',
        'maquina_id',
        'linea_id'
    ];
    

    public function maquina()
    {
        return $this->belongsTo(Maquina::class, 'maquina_id');
    }
}
