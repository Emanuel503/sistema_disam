<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    use HasFactory;

    public function descripciones()
    {
        return $this->belongsTo(DescripcionEquipos::class, 'id_descripcion');
    }

    public function estados()
    {
        return $this->belongsTo(EstadosEquipos::class, 'id_estado');
    }
}
