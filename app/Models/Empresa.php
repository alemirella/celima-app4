<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['nombre', 'ruc', 'telefono', 'direccion'];

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function lineas()
    {
        return $this->hasMany(LineaProduccion::class);
    }
    public function maquinas()
    {
        return $this->hasManyThrough(Maquina::class, LineaProduccion::class);
    }
    public function sensores()
    {
        return $this->hasManyThrough(Sensor::class, Maquina::class);
    }
}




