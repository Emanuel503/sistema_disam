<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correspondencias extends Model
{
    use HasFactory;

    public function usuario1()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
    public function usuario2()
    {
        return $this->belongsTo(User::class, 'id_usuario_dos');
    }

    public function usuario3()
    {
        return $this->belongsTo(User::class, 'id_usuario_tres');
    }

    public function usuario4()
    {
        return $this->belongsTo(User::class, 'id_usuario_cuatro');
    }
}