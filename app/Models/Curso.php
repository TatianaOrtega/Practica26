<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    public function creador()
    {
        return $this->hasOne('App\Models\Usuario','id_usuario','id_creador');
    }
}
