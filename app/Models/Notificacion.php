<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $fillable = [
        "maestro_registro_id", "referencia", "descripcion", "archivo", "fecha",
        "fecha_registro",
    ];
}
