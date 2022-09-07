<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemosInternos extends Model
{
    use HasFactory;

    public function estados()
    {
        return $this->belongsTo(EstadosPaos::class, 'id_estado');
    }

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'id_tecnico');
    }
}