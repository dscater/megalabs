<?php

namespace App\Http\Controllers;

use App\Models\MaestroRegistro;
use DateTime;
use Illuminate\Http\Request;

class MaestroRegistroController extends Controller
{
    public $validacion = [
        "institucion" => "required",
        "codigo_producto" => "nullable|min:1",
        "descripcion_figura_rs" => "required|min:1",
        "descripcion_sac" => "nullable|min:1",
        "comercializado" => "nullable|min:1",
        "numero_rs" => "nullable|min:1",
        "estado_sanitario" => "required",
        "actualizacion" => "nullable|min:1",
        "condicion_sanitario" => "nullable|min:1",
        "propiedad_lc" => "nullable|min:1",
        "prioridad" => "nullable|min:1",
        "responsable" => "nullable|min:1",
        "comentarios_registro" => "nullable|min:1",
        "comentarios_planificacion" => "nullable|min:1",
        "gdp" => "nullable|min:1",
        "presentacion_comercial" => "nullable|min:1",
        "presentacion_rs" => "nullable|min:1",
        "origen_rs" => "nullable|min:1",
        "fabricante" => "nullable|min:1",
        "para" => "nullable|min:1",
        "bajo_licencia" => "nullable|min:1",
        "principio_activo" => "nullable|min:1",
        "concentracion" => "nullable|min:1",
        "forma_farmaceutica_rs" => "nullable|min:1",
        "forma_farmaceutica_amornizada" => "nullable|min:1",
        "formula_cc" => "nullable|min:1",
        "venta_ventanilla" => "nullable|min:1",
        "condicion_venta" => "nullable|min:1",
        "contacto_tecnico" => "nullable|min:1",
        "vida_util" => "nullable|min:1",
        "atq" => "nullable|min:1",
        "condicion_almacenamiento" => "nullable|min:1",
        "linea_estucheria" => "nullable|min:1",
        "producto_licitacion" => "nullable|min:1",
    ];
    public $mensajes = [];

    public function index()
    {
        $maestro_registros = MaestroRegistro::all();
        return response()->JSON([
            "maestro_registros" => $maestro_registros,
            "total" => count($maestro_registros)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate($this->validacion);

        $request["dias_vencer"] = 0;
        $request["fecha_registro"] = date("Y-m-d");
        $maestro_registro = MaestroRegistro::create(array_map("mb_strtoupper", $request->all()));

        if ($maestro_registro->fecha_emision_rs != "" && $maestro_registro->fecha_emision_rs != "0000-00-00" && $maestro_registro->fecha_emision_rs != null && $maestro_registro->fecha_vencimiento_rs != "" && $maestro_registro->fecha_vencimiento_rs != "0000-00-00" && $maestro_registro->fecha_vencimiento_rs != null) {
            $date1 = new DateTime(date("Y-m-d", strtotime($maestro_registro->fecha_vencimiento_rs)));
            $date2 = new DateTime(date("Y-m-d", strtotime($maestro_registro->fecha_emision_rs)));
            $diff = $date1->diff($date2);
            $maestro_registro->dias_vencer = $diff->days;
            $maestro_registro->save();
            LoginController::setAlertas();
        }


        return response()->JSON([
            'sw' => true,
            'maestro_registro' => $maestro_registro,
            'msj' => 'El registro se realizó de forma correcta',
        ], 200);
    }

    public function show(MaestroRegistro $maestro_registro)
    {
        return response()->JSON($maestro_registro);
    }

    public function update(MaestroRegistro $maestro_registro, Request $request)
    {
        $request->validate($this->validacion);
        $maestro_registro->update(array_map("mb_strtoupper", $request->all()));
        if ($maestro_registro->fecha_emision_rs != "" && $maestro_registro->fecha_emision_rs != "0000-00-00" && $maestro_registro->fecha_emision_rs != null && $maestro_registro->fecha_vencimiento_rs != "" && $maestro_registro->fecha_vencimiento_rs != "0000-00-00" && $maestro_registro->fecha_vencimiento_rs != null) {
            $date1 = new DateTime(date("Y-m-d", strtotime($maestro_registro->fecha_vencimiento_rs)));
            $date2 = new DateTime(date("Y-m-d", strtotime($maestro_registro->fecha_emision_rs)));
            $diff = $date1->diff($date2);
            $maestro_registro->dias_vencer = $diff->days;
            $maestro_registro->save();
            LoginController::setAlertas();
        }

        return response()->JSON([
            'sw' => true,
            'maestro_registro' => $maestro_registro,
            'msj' => 'El registro se actualizó de forma correcta',
        ], 200);
    }

    public function destroy(MaestroRegistro $maestro_registro)
    {
        $maestro_registro->delete();
        return response()->JSON([
            'sw' => true,
            'msj' => 'El registro se eliminó de forma correcta',
        ], 200);
    }
}
