<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public $validacion = [
        "maestro_registro_id" => "required",
        "referencia" => "required|min:1",
        "fecha" => "required|date",
    ];
    public $mensajes = [];

    public function index()
    {
        $notificacions = Notificacion::all();
        return response()->JSON([
            "notificacions" => $notificacions,
            "total" => count($notificacions)
        ]);
    }

    public function store(Request $request)
    {
        if (isset($request->archivo)) {
            $this->validacion["archivo"] = "file|max:10240";
        }

        $request->validate($this->validacion);

        $request["fecha_registro"] = date("Y-m-d");
        $notificacion = Notificacion::create(array_map("mb_strtoupper", $request->except("archivo")));

        if ($request->hasFile('archivo')) {
            $file = $request->archivo;
            $nom_file = time() . '_notificacions' . $notificacion->id . '.' . $file->getClientOriginalExtension();
            $notificacion->archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }
        $notificacion->save();

        return response()->JSON([
            'sw' => true,
            'notificacion' => $notificacion,
            'msj' => 'El registro se realizó de forma correcta',
        ], 200);
    }

    public function show(Notificacion $notificacion)
    {
        return response()->JSON($notificacion);
    }

    public function update(Notificacion $notificacion, Request $request)
    {
        if (isset($request->archivo)) {
            $this->validacion["archivo"] = "file|max:10240";
        }

        $request->validate($this->validacion);
        $notificacion->update(array_map("mb_strtoupper", $request->except("archivo")));

        if ($request->hasFile('archivo')) {
            $antiguo = $notificacion->archivo;
            if ($antiguo) {
                \File::delete(public_path() . "/files/" . $antiguo);
            }
            $file = $request->archivo;
            $nom_file = time() . '_notificacions' . $notificacion->id . '.' . $file->getClientOriginalExtension();
            $notificacion->archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }
        $notificacion->save();

        return response()->JSON([
            'sw' => true,
            'notificacion' => $notificacion,
            'msj' => 'El registro se actualizó de forma correcta',
        ], 200);
    }

    public function destroy(Notificacion $notificacion)
    {
        $antiguo = $notificacion->archivo;
        if ($antiguo) {
            \File::delete(public_path() . "/files/" . $antiguo);
        }
        $notificacion->delete();
        return response()->JSON([
            'sw' => true,
            'msj' => 'El registro se eliminó de forma correcta',
        ], 200);
    }

    public function archivo(Notificacion $notificacion)
    {
        return response()->download(public_path() . "/files/" . $notificacion->archivo, $notificacion->archivo);
    }
}
