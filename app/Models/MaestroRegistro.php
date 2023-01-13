<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaestroRegistro extends Model
{
    use HasFactory;

    protected $fillable = [
        "institucion", "codigo_producto", "descripcion_figura_rs", "descripcion_sac",
        "comercializado", "numero_rs", "fecha_emision_rs", "fecha_vencimiento_rs",
        "dias_vencer", "estado_sanitario", "actualizacion", "condicion_sanitario",
        "propiedad_lc", "prioridad", "responsable", "fecha_revision_ab", "fecha_tentativa_agemed",
        "fecha_respuesta_agemed", "primera_fecha_ro", "segunda_fecha_ro", "fecha_tentativa_p",
        "fecha_estimada_o_rs2", "comentarios_registro", "comentarios_planificacion", "gdp",
        "presentacion_comercial", "presentacion_rs", "origen_rs", "fabricante", "para",
        "bajo_licencia", "fecha_rectificacion", "principio_activo", "concentracion",
        "forma_farmaceutica_rs", "forma_farmaceutica_amornizada", "formula_cc",
        "venta_ventanilla", "condicion_venta", "contacto_tecnico", "vida_util",
        "atq", "condicion_almacenamiento", "linea_estucheria", "fecha_inicio_comercializacion",
        "producto_licitacion", "registro_sanitario", "fecha_registro",
    ];

    protected $appends = ["url_registro_sanitario"];

    public function alertas()
    {
        return $this->hasMany(Alerta::class, 'maestro_registro_id');
    }

    public function getUrlRegistroSanitarioAttribute()
    {
        return "/files/" . $this->registro_sanitario;
    }
}
