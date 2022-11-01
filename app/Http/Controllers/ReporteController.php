<?php

namespace App\Http\Controllers;

use App\Models\MaestroRegistro;
use App\Models\SeguimientoAprobado;
use App\Models\SeguimientoRectificacion;
use App\Models\SeguimientoTramite;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class ReporteController extends Controller
{
    public function usuarios(Request $request)
    {
        $filtro =  $request->filtro;
        $usuarios = User::where('id', '!=', 1)->get();
        if ($filtro == 'Rango de fechas') {
            $request->validate([
                'fecha_ini' => 'required|date',
                'fecha_fin' => 'required|date',
            ]);
            $usuarios = User::where('id', '!=', 1)->whereBetween('fecha_registro', [$request->fecha_ini, $request->fecha_fin])->get();
        }

        if ($filtro == 'Tipo de usuario') {
            $request->validate([
                'tipo' => 'required',
            ]);
            $usuarios = User::where('id', '!=', 1)->where('tipo', $request->tipo)->get();
        }

        $pdf = PDF::loadView('reportes.usuarios', compact('usuarios'))->setPaper('legal', 'landscape');
        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->download('Usuarios.pdf');
    }

    public function maestro_registro(Request $request)
    {
        $filtro =  $request->filtro;

        $maestro_registros = MaestroRegistro::all();

        if ($filtro == 'Producto') {
            $request->validate([
                'maestro_registro_id' => 'required',
            ]);
            $maestro_registros = MaestroRegistro::where('id', $request->maestro_registro_id)->get();
        }

        if ($filtro == 'Estado del Registro Sanitario') {
            if ($request->estado_sanitario != "TODOS") {
                $request->validate([
                    'estado_sanitario' => 'required',
                ]);
                $maestro_registros = MaestroRegistro::where('estado_sanitario', $request->estado_sanitario)->get();
            }
        }

        if ($filtro == 'Rango de fechas') {
            $request->validate([
                'fecha_ini' => 'required|date',
                'fecha_fin' => 'required|date',
            ]);
            $maestro_registros = MaestroRegistro::whereBetween('fecha_registro', [$request->fecha_ini, $request->fecha_fin])->get();
        }

        $pdf = PDF::loadView('reportes.maestro_registro', compact('maestro_registros'))->setPaper('letter', 'portrait');
        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->download('maestro_registro.pdf');
    }
    public function seguimiento_tramites(Request $request)
    {
        $filtro =  $request->filtro;

        $seguimiento_tramites = SeguimientoTramite::all();

        if ($filtro == 'Producto') {
            $request->validate([
                'maestro_registro_id' => 'required',
            ]);
            $seguimiento_tramites = SeguimientoTramite::where('maestro_registro_id', $request->maestro_registro_id)->get();
        }

        if ($filtro == 'Rango de fechas') {
            $request->validate([
                'fecha_ini' => 'required|date',
                'fecha_fin' => 'required|date',
            ]);
            $seguimiento_tramites = SeguimientoTramite::whereBetween('fecha_registro', [$request->fecha_ini, $request->fecha_fin])->get();
        }

        $pdf = PDF::loadView('reportes.seguimiento_tramites', compact('seguimiento_tramites'))->setPaper('letter', 'portrait');
        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->download('seguimiento_tramites.pdf');
    }
    public function seguimiento_aprobados(Request $request)
    {
        $filtro =  $request->filtro;

        $seguimiento_aprobados = SeguimientoAprobado::all();

        if ($filtro == 'Producto') {
            $request->validate([
                'maestro_registro_id' => 'required',
            ]);
            $seguimiento_aprobados = SeguimientoAprobado::where('maestro_registro_id', $request->maestro_registro_id)->get();
        }

        if ($filtro == 'Rango de fechas') {
            $request->validate([
                'fecha_ini' => 'required|date',
                'fecha_fin' => 'required|date',
            ]);
            $seguimiento_aprobados = SeguimientoAprobado::whereBetween('fecha_registro', [$request->fecha_ini, $request->fecha_fin])->get();
        }

        $pdf = PDF::loadView('reportes.seguimiento_aprobados', compact('seguimiento_aprobados'))->setPaper('letter', 'portrait');
        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->download('seguimiento_tramites_aprobados.pdf');
    }
    public function seguimiento_rectificaciones(Request $request)
    {
        $filtro =  $request->filtro;

        $seguimiento_rectificaciones = SeguimientoRectificacion::all();

        if ($filtro == 'Producto') {
            $request->validate([
                'maestro_registro_id' => 'required',
            ]);
            $seguimiento_rectificaciones = SeguimientoRectificacion::where('maestro_registro_id', $request->maestro_registro_id)->get();
        }

        if ($filtro == 'Rango de fechas') {
            $request->validate([
                'fecha_ini' => 'required|date',
                'fecha_fin' => 'required|date',
            ]);
            $seguimiento_rectificaciones = SeguimientoRectificacion::whereBetween('fecha_registro', [$request->fecha_ini, $request->fecha_fin])->get();
        }

        $pdf = PDF::loadView('reportes.seguimiento_rectificaciones', compact('seguimiento_rectificaciones'))->setPaper('letter', 'portrait');
        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->download('seguimiento_rectificaciones.pdf');
    }
}
