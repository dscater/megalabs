<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\MaestroRegistro;
use App\Models\SeguimientoAprobado;
use App\Models\SeguimientoRectificacion;
use App\Models\SeguimientoTramite;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

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

    public function maestro_registro_excel()
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()
            ->setCreator("ADMIN")
            ->setLastModifiedBy('Administración')
            ->setTitle('MaestroRegistros')
            ->setSubject('MaestroRegistros')
            ->setDescription('MaestroRegistros')
            ->setKeywords('PHPSpreadsheet')
            ->setCategory('Listado');

        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');

        $styleTexto = [
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $estilo1 = [
            'font' => [
                'bold' => true,
                'size' => 9,
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => 'DCE6F1']
            ],
        ];
        $estilo2 = [
            'font' => [
                'bold' => true,
                'size' => 9,
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => 'DCE6F1']
            ],
        ];

        $styleArray2 = [
            'font' => [
                'bold' => true,
                'size' => 9,
                'color' => ['argb' => 'ffffff'],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => '0062A5']
            ],
        ];

        $estilo_conenido = [
            'font' => [
                'size' => 8,
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                // 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $estilo_conenido1 = [
            'font' => [
                'size' => 8,
                'bold' => true,
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                // 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $estilo_conenido2 = [
            'font' => [
                'size' => 8,
                'bold' => true,
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $estilo_total = [
            'font' => [
                'bold' => true,
                'size' => 11,
                'color' => ['argb' => 'ffffff'],
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => '0062A5']
            ],
        ];

        $maestro_registros = MaestroRegistro::all();

        $fila = 1;
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('logo');
        $drawing->setDescription('logo');
        $drawing->setPath(public_path() . '/imgs/' . Configuracion::first()->logo); // put your path and image here
        $drawing->setCoordinates('A' . $fila);
        $drawing->setOffsetX(5);
        $drawing->setOffsetY(0);
        $drawing->setHeight(60);
        $drawing->setWorksheet($sheet);
        $sheet->setCellValue('A' . $fila, "MAESTRO DE REGISTROS");
        $sheet->mergeCells("A" . $fila . ":AU" . $fila);  //COMBINAR CELDAS
        $sheet->getStyle('A' . $fila . ':AU' . $fila)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A' . $fila . ':AU' . $fila)->applyFromArray($styleTexto);
        $fila++;
        $fila++;
        $fila++;
        $fila++;

        $sheet->setCellValue('A' . $fila, 'Institución');
        $sheet->setCellValue('B' . $fila, 'Código Producto');
        $sheet->setCellValue('C' . $fila, 'Descripción de figura en el RS');
        $sheet->setCellValue('D' . $fila, 'Descripción SAC');
        $sheet->setCellValue('E' . $fila, 'Comercializado');
        $sheet->setCellValue('F' . $fila, 'Número de RS o NSO/Senasag');
        $sheet->setCellValue('G' . $fila, 'Fecha de emisión RS');
        $sheet->setCellValue('H' . $fila, 'Fecha de vencimiento del RS');
        $sheet->setCellValue('I' . $fila, 'Días a vencer');
        $sheet->setCellValue('J' . $fila, 'Estado del registro sanitario');
        $sheet->setCellValue('K' . $fila, 'Actualización');
        $sheet->setCellValue('L' . $fila, 'Condición del registro sanitario');
        $sheet->setCellValue('M' . $fila, 'Propiedad según lanzamiento y comercialización');
        $sheet->setCellValue('N' . $fila, 'Prioridad');
        $sheet->setCellValue('O' . $fila, 'Responsable');
        $sheet->setCellValue('P' . $fila, 'Fecha de revisión por analistas Bolivia');
        $sheet->setCellValue('Q' . $fila, 'Fecha tentativa de presentación AGEMED');
        $sheet->setCellValue('R' . $fila, 'Fecha tentativa de respuesta AGEMED');
        $sheet->setCellValue('S' . $fila, 'Primera fecha de resolución observado');
        $sheet->setCellValue('T' . $fila, 'Segunda Fecha de resolución observado');
        $sheet->setCellValue('U' . $fila, 'Fecha tentativa de propuesta');
        $sheet->setCellValue('V' . $fila, 'Fecha estimada de observación RS2');
        $sheet->setCellValue('W' . $fila, 'Comentarios para registro');
        $sheet->setCellValue('X' . $fila, 'Presentación planificación');
        $sheet->setCellValue('Y' . $fila, 'GDP');
        $sheet->setCellValue('Z' . $fila, 'Presentación comercial');
        $sheet->setCellValue('AA' . $fila, 'Presentación del RS');
        $sheet->setCellValue('AB' . $fila, 'Origen del RS');
        $sheet->setCellValue('AC' . $fila, 'Fabricante');
        $sheet->setCellValue('AD' . $fila, 'Para');
        $sheet->setCellValue('AE' . $fila, 'Bajo licencia');
        $sheet->setCellValue('AF' . $fila, 'Fecha de rectificación');
        $sheet->setCellValue('AG' . $fila, 'Principio activo');
        $sheet->setCellValue('AH' . $fila, 'Concentración');
        $sheet->setCellValue('AI' . $fila, 'Forma farmacéutica/Cosmética Según RS');
        $sheet->setCellValue('AJ' . $fila, 'Forma farmacéutica armonizada');
        $sheet->setCellValue('AK' . $fila, 'Formula cualitativa cuantitativa');
        $sheet->setCellValue('AL' . $fila, 'Venta por ventanilla');
        $sheet->setCellValue('AM' . $fila, 'Condición de venta');
        $sheet->setCellValue('AN' . $fila, 'Contacto técnico');
        $sheet->setCellValue('AO' . $fila, 'Vida útil meses');
        $sheet->setCellValue('AP' . $fila, 'ATQ');
        $sheet->setCellValue('AQ' . $fila, 'Condición de almacenamiento');
        $sheet->setCellValue('AR' . $fila, 'Línea de estuchería');
        $sheet->setCellValue('AS' . $fila, 'Fecha inicio de comercialización');
        $sheet->setCellValue('AT' . $fila, 'Producto licitación');
        $sheet->setCellValue('AU' . $fila, 'Fecha de registro');
        $sheet->getStyle('A' . $fila . ':AU' . $fila)->applyFromArray($styleArray2);
        $fila++;

        foreach ($maestro_registros as $mr) {
            $sheet->setCellValue('A' . $fila, $mr->institucion);
            $sheet->setCellValue('B' . $fila, $mr->codigo_producto);
            $sheet->setCellValue('C' . $fila, $mr->descripcion_figura_rs);
            $sheet->setCellValue('D' . $fila, $mr->descripcion_sac);
            $sheet->setCellValue('E' . $fila, $mr->comercializado);
            $sheet->setCellValue('F' . $fila, $mr->numero_rs);
            $sheet->setCellValue('G' . $fila, $mr->fecha_emision_rs != '0000-00-00' ? $mr->fecha_emision_rs : '');
            $sheet->setCellValue('H' . $fila, $mr->fecha_vencimiento_rs != '0000-00-00' ? $mr->fecha_vencimiento_rs : '');
            $sheet->setCellValue('I' . $fila, $mr->dias_vencer);
            $sheet->setCellValue('J' . $fila, $mr->estado_sanitario);
            $sheet->setCellValue('K' . $fila, $mr->actualizacion);
            $sheet->setCellValue('L' . $fila, $mr->condicion_sanitario);
            $sheet->setCellValue('M' . $fila, $mr->propiedad_lc);
            $sheet->setCellValue('N' . $fila, $mr->prioridad);
            $sheet->setCellValue('O' . $fila, $mr->responsable);
            $sheet->setCellValue('P' . $fila, $mr->fecha_revision_ab != '0000-00-00' ? $mr->fecha_revision_ab : '');
            $sheet->setCellValue('Q' . $fila, $mr->fecha_tentativa_agemed != '0000-00-00' ? $mr->fecha_tentativa_agemed : '');
            $sheet->setCellValue('R' . $fila, $mr->fecha_respuesta_agemed != '0000-00-00' ? $mr->fecha_respuesta_agemed : '');
            $sheet->setCellValue('S' . $fila, $mr->primera_fecha_ro != '0000-00-00' ? $mr->primera_fecha_ro : '');
            $sheet->setCellValue('T' . $fila, $mr->segunda_fecha_ro != '0000-00-00' ? $mr->segunda_fecha_ro : '');
            $sheet->setCellValue('U' . $fila, $mr->fecha_tentativa_p != '0000-00-00' ? $mr->fecha_tentativa_p : '');
            $sheet->setCellValue('V' . $fila, $mr->fecha_estimada_o_rs2 != '0000-00-00' ? $mr->fecha_estimada_o_rs2 : '');
            $sheet->setCellValue('W' . $fila, $mr->comentarios_registro);
            $sheet->setCellValue('X' . $fila, $mr->comentarios_planificacion);
            $sheet->setCellValue('Y' . $fila, $mr->gdp);
            $sheet->setCellValue('Z' . $fila, $mr->presentacion_comercial);
            $sheet->setCellValue('AA' . $fila, $mr->presentacion_rs);
            $sheet->setCellValue('AB' . $fila, $mr->origen_rs);
            $sheet->setCellValue('AC' . $fila, $mr->fabricante);
            $sheet->setCellValue('AD' . $fila, $mr->para);
            $sheet->setCellValue('AE' . $fila, $mr->bajo_licencia);
            $sheet->setCellValue('AF' . $fila, $mr->fecha_rectificacion != '0000-00-00' ? $mr->fecha_rectificacion : '');
            $sheet->setCellValue('AG' . $fila, $mr->principio_activo);
            $sheet->setCellValue('AH' . $fila, $mr->concentracion);
            $sheet->setCellValue('AI' . $fila, $mr->forma_farmaceutica_rs);
            $sheet->setCellValue('AJ' . $fila, $mr->forma_farmaceutica_amornizada);
            $sheet->setCellValue('AK' . $fila, $mr->formula_cc);
            $sheet->setCellValue('AL' . $fila, $mr->venta_ventanilla);
            $sheet->setCellValue('AM' . $fila, $mr->condicion_venta);
            $sheet->setCellValue('AN' . $fila, $mr->contacto_tecnico);
            $sheet->setCellValue('AO' . $fila, $mr->vida_util);
            $sheet->setCellValue('AP' . $fila, $mr->atq);
            $sheet->setCellValue('AQ' . $fila, $mr->condicion_almacenamiento);
            $sheet->setCellValue('AR' . $fila, $mr->linea_estucheria);
            $sheet->setCellValue('AS' . $fila, $mr->fecha_inicio_comercializacion != '0000-00-00' ? $mr->fecha_inicio_comercializacion : '');
            $sheet->setCellValue('AT' . $fila, $mr->producto_licitacion);
            $sheet->setCellValue('AU' . $fila, $mr->fecha_registro != '0000-00-00' ? $mr->fecha_registro : '');
            $sheet->getStyle('A' . $fila . ':AU' . $fila)->applyFromArray($estilo_conenido);
            $fila++;
        }

        $sheet->getColumnDimension('A')->setWidth(15);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->getColumnDimension('H')->setWidth(15);
        $sheet->getColumnDimension('I')->setWidth(15);
        $sheet->getColumnDimension('J')->setWidth(15);
        $sheet->getColumnDimension('K')->setWidth(15);
        $sheet->getColumnDimension('L')->setWidth(15);
        $sheet->getColumnDimension('M')->setWidth(15);
        $sheet->getColumnDimension('N')->setWidth(15);
        $sheet->getColumnDimension('O')->setWidth(15);
        $sheet->getColumnDimension('P')->setWidth(15);
        $sheet->getColumnDimension('Q')->setWidth(15);
        $sheet->getColumnDimension('R')->setWidth(15);
        $sheet->getColumnDimension('S')->setWidth(15);
        $sheet->getColumnDimension('T')->setWidth(15);
        $sheet->getColumnDimension('U')->setWidth(15);
        $sheet->getColumnDimension('V')->setWidth(15);
        $sheet->getColumnDimension('W')->setWidth(15);
        $sheet->getColumnDimension('X')->setWidth(15);
        $sheet->getColumnDimension('Y')->setWidth(15);
        $sheet->getColumnDimension('Z')->setWidth(15);
        $sheet->getColumnDimension('AA')->setWidth(15);
        $sheet->getColumnDimension('AB')->setWidth(15);
        $sheet->getColumnDimension('AC')->setWidth(15);
        $sheet->getColumnDimension('AD')->setWidth(15);
        $sheet->getColumnDimension('AE')->setWidth(15);
        $sheet->getColumnDimension('AF')->setWidth(15);
        $sheet->getColumnDimension('AG')->setWidth(15);
        $sheet->getColumnDimension('AH')->setWidth(15);
        $sheet->getColumnDimension('AI')->setWidth(15);
        $sheet->getColumnDimension('AJ')->setWidth(15);
        $sheet->getColumnDimension('AK')->setWidth(15);
        $sheet->getColumnDimension('AL')->setWidth(15);
        $sheet->getColumnDimension('AM')->setWidth(15);
        $sheet->getColumnDimension('AN')->setWidth(15);
        $sheet->getColumnDimension('AO')->setWidth(15);
        $sheet->getColumnDimension('AP')->setWidth(15);
        $sheet->getColumnDimension('AQ')->setWidth(15);
        $sheet->getColumnDimension('AR')->setWidth(15);
        $sheet->getColumnDimension('AS')->setWidth(15);
        $sheet->getColumnDimension('AT')->setWidth(15);
        $sheet->getColumnDimension('AU')->setWidth(15);
        $sheet->getColumnDimension('AU')->setWidth(15);

        foreach (range('A', 'AU') as $columnID) {
            $sheet->getStyle($columnID)->getAlignment()->setWrapText(true);
        }

        // DESCARGA DEL ARCHIVO
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="MaestroRegistros.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
