<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    use HasFactory;

    protected $fillable = [
        "maestro_registro_id", "descripcion", "fecha", "fecha_registro",
    ];

    protected $with = ["maestro_registro"];

    public function maestro_registro()
    {
        return $this->belongsTo(MaestroRegistro::class, 'maestro_registro_id');
    }

    public static function setAlertas()
    {
        $maestro_registros = MaestroRegistro::all();
        $fecha = date("Y-m-d");
        $total = 0;
        foreach ($maestro_registros as $maestro_registro) {
            if ($maestro_registro->fecha_vencimiento_rs != "" && $maestro_registro->fecha_vencimiento_rs != "0000-00-00" && $maestro_registro->fecha_vencimiento_rs != null && date("Y-m-d", strtotime($maestro_registro->fecha_vencimiento_rs . "-15 days")) < date("Y-m-d")) {

                $alerta = Alerta::where("maestro_registro_id", $maestro_registro->id)->where("fecha", $fecha)->get()->first();
                if (!$alerta) {
                    $nom_prod = $maestro_registro->codigo_producto . ' DE ' . $maestro_registro->institucion;
                    $date1 = new DateTime($fecha);
                    $date2 = new DateTime(date("Y-m-d", strtotime($maestro_registro->fecha_vencimiento_rs)));
                    $diff = $date1->diff($date2);
                    $dias_diff = $diff->days;

                    $descripcion = "EL PRODUCTO $nom_prod LE QUEDAN $dias_diff DÍAS PARA SU VENCIMIENTO";
                    if ($fecha > date("Y-m-d", strtotime($maestro_registro->fecha_vencimiento_rs))) {
                        $descripcion = "EL PRODUCTO $nom_prod YA TIENE $dias_diff DÍAS QUE VENCIÓ";
                        $maestro_registro->estado_sanitario = "VENCIDO";
                        $maestro_registro->save();
                    }

                    $maestro_registro->alertas()->create([
                        "descripcion" => $descripcion,
                        "fecha" => $fecha,
                        "fecha_registro" => $fecha,
                    ]);
                }
                $total++;
            }
        }
        return $total;
    }
}
