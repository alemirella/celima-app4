<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaProduccion extends Model
{
    use HasFactory;

    protected $table = 'lineas_produccion'; 

    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion',
        'numero_maquinas',
        'estado',
        'empresa_id'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function maquinas()
    {
        return $this->hasMany(Maquina::class, 'linea_id');
    }
}
