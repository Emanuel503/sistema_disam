<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoEquipos extends Model
{
    use HasFactory;

    public function motivos()
    {
        return $this->belongsTo(MotivosMovimientosEquipos::class, 'id_motivo');
    }

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}