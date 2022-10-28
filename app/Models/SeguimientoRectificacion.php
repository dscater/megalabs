<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoRectificacion extends Model
{
    use HasFactory;

    protected $fillable = [
        "maestro_registro_id", "responsable", "tipo_tramite", "fecha_ingreso",
        "codigo_misa", "hoja_ruta", "motivo_rectificacion", "agemed_estado", "agemed_fecha", "megalabs_estado", "megalabs_fecha",
        "rs_fecha", "rs_nro_registro", "rs_fecha_recojo", "fecha_registro",
    ];

    protected $with = ["maestro_registro"];

    public function maestro_registro()
    {
        return $this->belongsTo(MaestroRegistro::class, "maestro_registro_id");
    }
}
