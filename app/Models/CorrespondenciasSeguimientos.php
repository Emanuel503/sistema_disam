<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrespondenciasSeguimientos extends Model
{
    use HasFactory;

    public function estados()
    {
        return $this->belongsTo(EstadosCorrespondenciaSeguimientos::class, 'id_estado');
    }
}