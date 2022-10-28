<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoTramite extends Model
{
    use HasFactory;

    protected $fillable = [
        "maestro_registro_id", "responsable", "tipo_tramite", "fecha_ingreso",
        "codigo_misa", "hora_ruta", "ameged_estado", "ameged_fecha", "megalabs_estado",
        "megalabs_fecha", "rs_fecha_aprobacion", "rs_nro_registro", "rs_fecha_recojo",
        "cpp_estado", "cpp_carta", "cpp_cite", "cpp_archivo", "muestra_estado", "muestra_carta",
        "muestra_cite", "muestra_archivo", "desplegado_estado", "desplegado_carta",
        "desplegado_cite", "desplegado_archivo", "gmp_estado", "gmp_carta",
        "gmp_cite", "gmp_archivo", "rl_estado", "rl_carta", "rl_cite", "rl_archivo",
        "fecha_registro",
    ];

    protected $with = ["maestro_registro"];

    public function maestro_registro()
    {
        return $this->belongsTo(MaestroRegistro::class, "maestro_registro_id");
    }
}
