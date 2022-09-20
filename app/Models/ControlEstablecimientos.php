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

    public function departamentos()
    {
        return $this->belongsTo(Departamentos::class, 'id_departamento');
    }

    public function municipios()
    {
        return $this->belongsTo(Municipios::class, 'id_municipio');
    }
}