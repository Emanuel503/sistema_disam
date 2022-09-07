<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correspondencias extends Model
{
    use HasFactory;

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}