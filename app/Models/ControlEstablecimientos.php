<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlEstablecimientos extends Model
{
    use HasFactory;

    public function tipos()
    {
        return $this->belongsTo(TiposEstablecimientos::class, 'id_tipo');
    }
}