<?php

namespace App\Http\Controllers;

use App\Models\SeguimientoAprobado;
use Illuminate\Http\Request;

class SeguimientoAprobadoController extends Controller
{
    public $validacion = [
        "maestro_registro_id" => "required",
        "fecha_aprobacion" => "required|date",
        "estado_final" => "nullable|min:1",
        "observacion" => "nullable|min:1",
    ];
    public $mensajes = [];

    public function index()
    {
        $seguimiento_aprobados = SeguimientoAprobado::all();
        return response()->JSON([
            "seguimiento_aprobados" => $seguimiento_aprobados,
            "total" => count($seguimiento_aprobados)
        ]);
    }

    public function store(Request $request)
    {
        if (isset($request->archivo)) {
            $this->validacion["archivo"] = "file|max:10240";
        }

        $request->validate($this->validacion);

        $request["fecha_registro"] = date("Y-m-d");
        $seguimiento_aprobado = SeguimientoAprobado::create(array_map("mb_strtoupper", $request->except("archivo")));

        if ($request->hasFile('archivo')) {
            $file = $request->archivo;
            $nom_file = time() . '_aprobados' . $seguimiento_aprobado->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_aprobado->archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }
        $seguimiento_aprobado->save();

        return response()->JSON([
            'sw' => true,
            'seguimiento_aprobado' => $seguimiento_aprobado,
            'msj' => 'El registro se realizó de forma correcta',
        ], 200);
    }

    public function show(SeguimientoAprobado $seguimiento_aprobado)
    {
        return response()->JSON($seguimiento_aprobado);
    }

    public function update(SeguimientoAprobado $seguimiento_aprobado, Request $request)
    {
        if (isset($request->archivo)) {
            $this->validacion["archivo"] = "file|max:10240";
        }

        $request->validate($this->validacion);
        $seguimiento_aprobado->update(array_map("mb_strtoupper", $request->except("archivo")));

        if ($request->hasFile('archivo')) {
            $antiguo = $seguimiento_aprobado->archivo;
            if ($antiguo) {
                \File::delete(public_path() . "/files/" . $antiguo);
            }
            $file = $request->archivo;
            $nom_file = time() . '_aprobados' . $seguimiento_aprobado->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_aprobado->archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }
        $seguimiento_aprobado->save();

        return response()->JSON([
            'sw' => true,
            'seguimiento_aprobado' => $seguimiento_aprobado,
            'msj' => 'El registro se actualizó de forma correcta',
        ], 200);
    }

    public function destroy(SeguimientoAprobado $seguimiento_aprobado)
    {
        $antiguo = $seguimiento_aprobado->archivo;
            if ($antiguo) {
                \File::delete(public_path() . "/files/" . $antiguo);
            }
        $seguimiento_aprobado->delete();
        return response()->JSON([
            'sw' => true,
            'msj' => 'El registro se eliminó de forma correcta',
        ], 200);
    }
}
