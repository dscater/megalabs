<?php

namespace App\Http\Controllers;

use App\Models\SeguimientoTramite;
use Illuminate\Http\Request;

class SeguimientoTramiteController extends Controller
{
    public $validacion = [
        "maestro_registro_id" => "required",
        "responsable" => "nullable|min:1",
        "tipo_tramite" => "nullable|min:1",
        "codigo_misa" => "nullable|min:1",
        "hora_ruta" => "nullable|min:1",
        "ameged_estado" => "nullable|min:1",
        "megalabs_estado" => "nullable|min:1",
        "rs_nro_registro" => "nullable|min:1",
        "cpp_estado" => "nullable|min:1",
        "cpp_carta" => "nullable|min:1",
        "cpp_cite" => "nullable|min:1",
        "muestra_estado" => "nullable|min:1",
        "muestra_carta" => "nullable|min:1",
        "muestra_cite" => "nullable|min:1",
        "desplegado_estado" => "nullable|min:1",
        "desplegado_carta" => "nullable|min:1",
        "desplegado_cite" => "nullable|min:1",
        "gmp_estado" => "nullable|min:1",
        "gmp_carta" => "nullable|min:1",
        "gmp_cite" => "nullable|min:1",
        "rl_estado" => "nullable|min:1",
        "rl_carta" => "nullable|min:1",
        "rl_cite" => "nullable|min:1",

        "estado_final" => "required",
    ];
    public $mensajes = [];

    public function index()
    {
        $seguimiento_tramites = SeguimientoTramite::get();
        return response()->JSON([
            "seguimiento_tramites" => $seguimiento_tramites,
            "total" => count($seguimiento_tramites)
        ]);
    }

    public function store(Request $request)
    {
        if (isset($request->cpp_archivo)) {
            $this->validacion["cpp_archivo"] = "file|max:10240";
        }

        if (isset($request->muestra_archivo)) {
            $this->validacion["muestra_archivo"] = "file|max:10240";
        }

        if (isset($request->desplegado_archivo)) {
            $this->validacion["desplegado_archivo"] = "file|max:10240";
        }

        if (isset($request->gmp_archivo)) {
            $this->validacion["gmp_archivo"] = "file|max:10240";
        }

        if (isset($request->rl_archivo)) {
            $this->validacion["rl_archivo"] = "file|max:10240";
        }

        $request->validate($this->validacion);

        $request["dias_vencer"] = 0;
        $request["fecha_registro"] = date("Y-m-d");
        $seguimiento_tramite = SeguimientoTramite::create(array_map("mb_strtoupper", $request->except("cpp_archivo", "muestra_archivo", "desplegado_archivo", "gmp_archivo", "rl_archivo")));

        if ($request->hasFile('cpp_archivo')) {
            $file = $request->cpp_archivo;
            $nom_file = time() . '_cpp_archivo' . $seguimiento_tramite->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_tramite->cpp_archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }

        if ($request->hasFile('muestra_archivo')) {
            $file = $request->muestra_archivo;
            $nom_file = time() . '_muestra_archivo' . $seguimiento_tramite->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_tramite->muestra_archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }

        if ($request->hasFile('desplegado_archivo')) {
            $file = $request->desplegado_archivo;
            $nom_file = time() . '_desplegado_archivo' . $seguimiento_tramite->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_tramite->desplegado_archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }

        if ($request->hasFile('gmp_archivo')) {
            $file = $request->gmp_archivo;
            $nom_file = time() . '_gmp_archivo' . $seguimiento_tramite->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_tramite->gmp_archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }

        if ($request->hasFile('rl_archivo')) {
            $file = $request->rl_archivo;
            $nom_file = time() . '_rl_archivo' . $seguimiento_tramite->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_tramite->rl_archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }

        if ($request->hasFile('archivo_aprobacion')) {
            $file = $request->archivo_aprobacion;
            $nom_file = time() . '_archivo_aprobacion' . $seguimiento_tramite->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_tramite->archivo_aprobacion = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }

        $seguimiento_tramite->save();

        return response()->JSON([
            'sw' => true,
            'seguimiento_tramite' => $seguimiento_tramite,
            'msj' => 'El registro se realizó de forma correcta',
        ], 200);
    }

    public function show(SeguimientoTramite $seguimiento_tramite)
    {
        return response()->JSON($seguimiento_tramite);
    }

    public function update(SeguimientoTramite $seguimiento_tramite, Request $request)
    {
        if (isset($request->cpp_archivo)) {
            $this->validacion["cpp_archivo"] = "file|max:10240";
        }

        if (isset($request->muestra_archivo)) {
            $this->validacion["muestra_archivo"] = "file|max:10240";
        }

        if (isset($request->desplegado_archivo)) {
            $this->validacion["desplegado_archivo"] = "file|max:10240";
        }

        if (isset($request->gmp_archivo)) {
            $this->validacion["gmp_archivo"] = "file|max:10240";
        }

        if (isset($request->rl_archivo)) {
            $this->validacion["rl_archivo"] = "file|max:10240";
        }

        $request->validate($this->validacion);
        $seguimiento_tramite->update(array_map("mb_strtoupper", $request->except("cpp_archivo", "muestra_archivo", "desplegado_archivo", "gmp_archivo", "rl_archivo")));

        if ($request->hasFile('cpp_archivo')) {
            $antiguo = $seguimiento_tramite->cpp_archivo;
            if ($antiguo) {
                \File::delete(public_path() . "/files/" . $antiguo);
            }
            $file = $request->cpp_archivo;
            $nom_file = time() . '_cpp_archivo' . $seguimiento_tramite->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_tramite->cpp_archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }

        if ($request->hasFile('muestra_archivo')) {
            $antiguo = $seguimiento_tramite->muestra_archivo;
            if ($antiguo) {
                \File::delete(public_path() . "/files/" . $antiguo);
            }
            $file = $request->muestra_archivo;
            $nom_file = time() . '_muestra_archivo' . $seguimiento_tramite->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_tramite->muestra_archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }

        if ($request->hasFile('desplegado_archivo')) {
            $antiguo = $seguimiento_tramite->desplegado_archivo;
            if ($antiguo) {
                \File::delete(public_path() . "/files/" . $antiguo);
            }
            $file = $request->desplegado_archivo;
            $nom_file = time() . '_desplegado_archivo' . $seguimiento_tramite->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_tramite->desplegado_archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }

        if ($request->hasFile('gmp_archivo')) {
            $antiguo = $seguimiento_tramite->gmp_archivo;
            if ($antiguo) {
                \File::delete(public_path() . "/files/" . $antiguo);
            }
            $file = $request->gmp_archivo;
            $nom_file = time() . '_gmp_archivo' . $seguimiento_tramite->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_tramite->gmp_archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }

        if ($request->hasFile('rl_archivo')) {
            $antiguo = $seguimiento_tramite->rl_archivo;
            if ($antiguo) {
                \File::delete(public_path() . "/files/" . $antiguo);
            }
            $file = $request->rl_archivo;
            $nom_file = time() . '_rl_archivo' . $seguimiento_tramite->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_tramite->rl_archivo = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }

        if ($request->hasFile('archivo_aprobacion')) {
            $antiguo = $seguimiento_tramite->archivo_aprobacion;
            if ($antiguo) {
                \File::delete(public_path() . "/files/" . $antiguo);
            }
            $file = $request->archivo_aprobacion;
            $nom_file = time() . '_archivo_aprobacion' . $seguimiento_tramite->id . '.' . $file->getClientOriginalExtension();
            $seguimiento_tramite->archivo_aprobacion = $nom_file;
            $file->move(public_path() . "/files/", $nom_file);
        }

        $seguimiento_tramite->save();

        return response()->JSON([
            'sw' => true,
            'seguimiento_tramite' => $seguimiento_tramite,
            'msj' => 'El registro se actualizó de forma correcta',
        ], 200);
    }

    public function destroy(SeguimientoTramite $seguimiento_tramite)
    {
        $seguimiento_tramite->delete();
        return response()->JSON([
            'sw' => true,
            'msj' => 'El registro se eliminó de forma correcta',
        ], 200);
    }


    public function archivo(SeguimientoTramite $seguimiento_tramite, Request $request)
    {
        return response()->download(public_path() . "/files/" . $seguimiento_tramite[$request->archivo], $seguimiento_tramite[$request->archivo]);
    }
}
