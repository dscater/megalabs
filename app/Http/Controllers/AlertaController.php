<?php

namespace App\Http\Controllers;

use App\Models\Alerta;
use Illuminate\Http\Request;

class AlertaController extends Controller
{
    public $validacion = [
        "maestro_registro_id" => "required",
        "descripcion" => "required|min:1",
        "fecha" => "required|date",
    ];
    public $mensajes = [];

    public function index()
    {
        $alertas = Alerta::orderBy("created_at", "desc")->get();
        return response()->JSON([
            "alertas" => $alertas,
            "total" => count($alertas)
        ]);
    }

    public function store(Request $request)
    {
        $total_alertas = Alerta::setAlertas();

        return response()->JSON([
            'sw' => true,
            'total_alertas' => $total_alertas
        ], 200);
    }

    public function show(Alerta $alerta)
    {
        return response()->JSON($alerta);
    }

    public function update(Alerta $alerta, Request $request)
    {
        if (isset($request->archivo)) {
            $this->validacion["archivo"] = "file|max:10240";
        }

        $request->validate($this->validacion);
        $alerta->update(array_map("mb_strtoupper", $request->except("archivo")));

        if ($request->hasFile('archivo')) {
            $antiguo = $alerta->archivo;
            if ($antiguo) {
                \File::delete(public_path() . "/files/" . $antiguo);
            }
            $file = $request->archivo;
            $nom_file = time() . '_alertas' . $alerta->id . '.' . $file->getClientOriginalExtension();
            $alerta->archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }
        $alerta->save();

        return response()->JSON([
            'sw' => true,
            'alerta' => $alerta,
            'msj' => 'El registro se actualizó de forma correcta',
        ], 200);
    }

    public function destroy(Alerta $alerta)
    {
        $antiguo = $alerta->archivo;
        if ($antiguo) {
            \File::delete(public_path() . "/files/" . $antiguo);
        }
        $alerta->delete();
        return response()->JSON([
            'sw' => true,
            'msj' => 'El registro se eliminó de forma correcta',
        ], 200);
    }
}
