<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        "maestro_registro_id", "referencia", "descripcion", "archivo", "fecha", "fecha_registro",
    ];

    protected $with = ["maestro_registro"];

    public function maestro_registro()
    {
        return $this->belongsTo(MaestroRegistro::class, 'maestro_registro_id');
    }
}
