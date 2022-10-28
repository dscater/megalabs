<?php

namespace App\Http\Controllers;

use App\Models\SeguimientoRectificacion;
use Illuminate\Http\Request;

class SeguimientoRectificacionController extends Controller
{
    public $validacion = [
        "maestro_registro_id" => "required",
        "responsable" => "nullable|min:1",
        "codigo_misa" => "nullable|min:1",
        "hoja_ruta" => "nullable|min:1",
        "motivo_rectificacion" => "nullable|min:1",
        "agemed_estado" => "nullable|min:1",
        "agemed_observacion" => "nullable|min:1",
        "megalabs_estado" => "nullable|min:1",
        "rs_nro_registro" => "nullable|min:1",
    ];
    public $mensajes = [];

    public function index()
    {
        $seguimiento_rectificacions = SeguimientoRectificacion::all();
        return response()->JSON([
            "seguimiento_rectificacions" => $seguimiento_rectificacions,
            "total" => count($seguimiento_rectificacions)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate($this->validacion);

        $request["fecha_registro"] = date("Y-m-d");
        $seguimiento_rectificacion = SeguimientoRectificacion::create(array_map("mb_strtoupper", $request->all()));

        if ($request->hasFile('rl_archivo')) {
            $file = $request->rl_archivo;
            $nom_file = time() . '_rl_archivo' . $seguimiento_rectificacion->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_rectificacion->rl_archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }
        $seguimiento_rectificacion->save();

        return response()->JSON([
            'sw' => true,
            'seguimiento_rectificacion' => $seguimiento_rectificacion,
            'msj' => 'El registro se realizó de forma correcta',
        ], 200);
    }

    public function show(SeguimientoRectificacion $seguimiento_rectificacion)
    {
        return response()->JSON($seguimiento_rectificacion);
    }

    public function update(SeguimientoRectificacion $seguimiento_rectificacion, Request $request)
    {
        $request->validate($this->validacion);
        $seguimiento_rectificacion->update(array_map("mb_strtoupper", $request->all()));

        return response()->JSON([
            'sw' => true,
            'seguimiento_rectificacion' => $seguimiento_rectificacion,
            'msj' => 'El registro se actualizó de forma correcta',
        ], 200);
    }

    public function destroy(SeguimientoRectificacion $seguimiento_rectificacion)
    {
        $seguimiento_rectificacion->delete();
        return response()->JSON([
            'sw' => true,
            'msj' => 'El registro se eliminó de forma correcta',
        ], 200);
    }
}
