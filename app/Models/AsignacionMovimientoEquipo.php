<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionMovimientoEquipo extends Model
{
    use HasFactory;

    public function equipos()
    {
        return $this->belongsTo(Equipos::class, 'id_equipo');
    }
}
