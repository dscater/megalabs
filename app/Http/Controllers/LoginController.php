<?php

namespace App\Http\Controllers;

use App\Models\Alerta;
use App\Models\MaestroRegistro;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $usuario = $request->usuario;
        $password = $request->password;
        $res = Auth::attempt(['usuario' => $usuario, 'password' => $password]);
        if ($res) {
            self::setAlertas();
            return response()->JSON([
                'user' => Auth::user(),
            ], 200);
        }

        return response()->JSON([], 401);
    }

    public function logout()
    {
        Auth::logout();
        return response()->JSON(['code' => 204], 204);
    }

    public static function setAlertas()
    {
        $maestro_registros = MaestroRegistro::all();
        $fecha = date("Y-m-d");
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
                    }

                    $maestro_registro->alertas()->create([
                        "descripcion" => $descripcion,
                        "fecha" => $fecha,
                        "fecha_registro" => $fecha,
                    ]);
                }
            }
        }
    }
}
