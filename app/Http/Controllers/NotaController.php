<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public $validacion = [
        "maestro_registro_id" => "required",
        "referencia" => "required|min:1",
        "fecha" => "required|date",
    ];
    public $mensajes = [];

    public function index()
    {
        $notas = Nota::all();
        return response()->JSON([
            "notas" => $notas,
            "total" => count($notas)
        ]);
    }

    public function store(Request $request)
    {
        if (isset($request->archivo)) {
            $this->validacion["archivo"] = "file|max:10240";
        }

        $request->validate($this->validacion);

        $request["fecha_registro"] = date("Y-m-d");
        $nota = Nota::create(array_map("mb_strtoupper", $request->except("archivo")));

        if ($request->hasFile('archivo')) {
            $file = $request->archivo;
            $nom_file = time() . '_notas' . $nota->id . '.' . $file->getClientOriginalExtension();
            $nota->archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }
        $nota->save();

        return response()->JSON([
            'sw' => true,
            'nota' => $nota,
            'msj' => 'El registro se realizó de forma correcta',
        ], 200);
    }

    public function show(Nota $nota)
    {
        return response()->JSON($nota);
    }

    public function update(Nota $nota, Request $request)
    {
        if (isset($request->archivo)) {
            $this->validacion["archivo"] = "file|max:10240";
        }

        $request->validate($this->validacion);
        $nota->update(array_map("mb_strtoupper", $request->except("archivo")));

        if ($request->hasFile('archivo')) {
            $antiguo = $nota->archivo;
            if ($antiguo) {
                \File::delete(public_path() . "/files/" . $antiguo);
            }
            $file = $request->archivo;
            $nom_file = time() . '_notas' . $nota->id . '.' . $file->getClientOriginalExtension();
            $nota->archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }
        $nota->save();

        return response()->JSON([
            'sw' => true,
            'nota' => $nota,
            'msj' => 'El registro se actualizó de forma correcta',
        ], 200);
    }

    public function destroy(Nota $nota)
    {
        $antiguo = $nota->archivo;
        if ($antiguo) {
            \File::delete(public_path() . "/files/" . $antiguo);
        }
        $nota->delete();
        return response()->JSON([
            'sw' => true,
            'msj' => 'El registro se eliminó de forma correcta',
        ], 200);
    }

    public function archivo(Nota $nota)
    {
        return response()->download(public_path() . "/files/" . $nota->archivo, $nota->archivo);
    }
}
