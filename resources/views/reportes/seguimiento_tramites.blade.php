<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Seguimiento de Tramites</title>
    <style type="text/css">
        * {
            font-family: sans-serif;
        }

        @page {
            margin-top: 1.5cm;
            margin-bottom: 1.5cm;
            margin-left: 1.5cm;
            margin-right: 1cm;
            border: 5px solid blue;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-top: 20px;
        }

        table thead tr th,
        tbody tr td {
            font-size: 0.63em;
            word-wrap: break-word;
        }

        .encabezado {
            width: 100%;
        }

        .logo img {
            position: absolute;
            width: 200px;
            height: 90px;
            top: -20px;
            left: -20px;
        }

        h2.titulo {
            width: 450px;
            margin: auto;
            margin-top: 15px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 14pt;
        }

        .texto {
            width: 250px;
            text-align: center;
            margin: auto;
            margin-top: 15px;
            font-weight: bold;
            font-size: 1.1em;
        }

        .fecha {
            width: 250px;
            text-align: center;
            margin: auto;
            margin-top: 15px;
            font-weight: normal;
            font-size: 0.85em;
        }

        .total {
            text-align: right;
            padding-right: 15px;
            font-weight: bold;
        }

        table {
            width: 100%;
        }

        table thead {
            background: rgb(236, 236, 236)
        }

        table thead tr th {
            padding: 3px;
            font-size: 0.7em;
        }

        table tbody tr td {
            padding: 3px;
            font-size: 0.55em;
        }

        table tbody tr td.franco {
            background: red;
            color: white;
        }

        .centreado {
            padding-left: 0px;
            text-align: center;
        }

        .datos {
            margin-left: 15px;
            border-top: solid 1px;
            border-collapse: collapse;
            width: 250px;
        }

        .txt {
            font-weight: bold;
            text-align: right;
            padding-right: 5px;
        }

        .txt_center {
            font-weight: bold;
            text-align: center;
        }

        .cumplimiento {
            position: absolute;
            width: 150px;
            right: 0px;
            top: 86px;
        }

        .p_cump {
            color: red;
            font-size: 1.2em;
        }

        .b_top {
            border-top: solid 1px black;
        }

        .gray {
            background: rgb(236, 236, 236);
        }

        .dark_gray {
            background: rgb(197, 197, 197);
        }

        .bold {
            font-weight: bold;
        }

        .img_celda img {
            width: 45px;
        }
    </style>
</head>

<body>
    @inject('configuracion', 'App\Models\Configuracion')
    <div class="encabezado">
        <div class="logo">
            <img src="{{ asset('imgs/' . $configuracion->first()->logo) }}">
        </div>
        <h2 class="titulo">
            {{ $configuracion->first()->razon_social }}
        </h2>
        <h4 class="texto">LISTA DE MAESTRO DE REGISTRO</h4>
        <h4 class="fecha">Expedido: {{ date('d-m-Y') }}</h4>
    </div>

    @foreach ($seguimiento_tramites as $seguimiento_tramite)
        <table border="1">
            <tbody>
                <tr>
                    <td class="dark_gray bold" width="20%">Producto</td>
                    <td class="dark_gray bold">
                        {{ $seguimiento_tramite->maestro_registro->codigo_producto }}-{{ $seguimiento_tramite->maestro_registro->institucion }}
                    </td>
                </tr>
                <tr>
                    <td class="gray bold">Tipo de Trámite</td>
                    <td>{{ $seguimiento_tramite->tipo_tramite }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha de Ingreso</td>
                    <td>{{ $seguimiento_tramite->fecha_ingreso && $seguimiento_tramite->fecha_ingreso != '0000-00-00' ? date('d/m/Y', strtotime($seguimiento_tramite->fecha_ingreso)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td class="gray bold">Código MISA</td>
                    <td>{{ $seguimiento_tramite->codigo_misa }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Hoja de Ruta</td>
                    <td>{{ $seguimiento_tramite->hoja_ruta }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="centreado dark_gray bold">Estado MISA-AGEMED(Observaciones)</td>
                </tr>
                <tr>
                    <td class="gray bold">Estado Observaciones</td>
                    <td>{{ $seguimiento_tramite->ameged_estado }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha Observación</td>
                    <td>{{ $seguimiento_tramite->ameged_fecha && $seguimiento_tramite->ameged_fecha != '0000-00-00' ? date('d/m/Y', strtotime($seguimiento_tramite->ameged_fecha)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="centreado dark_gray bold">Estado MISA-MEGALABS(Subsanaciones)</td>
                </tr>
                <tr>
                    <td class="gray bold">Estado</td>
                    <td>{{ $seguimiento_tramite->megalabs_estado }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha Presentación</td>
                    <td>{{ $seguimiento_tramite->megalabs_fecha && $seguimiento_tramite->megalabs_fecha != '0000-00-00' ? date('d/m/Y', strtotime($seguimiento_tramite->megalabs_fecha)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="centreado dark_gray bold">Registros Sanitarios Aprobados</td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha de Aprobación</td>
                    <td>{{ $seguimiento_tramite->rs_fecha_aprobacion && $seguimiento_tramite->rs_fecha_aprobacion != '0000-00-00' ? date('d/m/Y', strtotime($seguimiento_tramite->rs_fecha_aprobacion)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td class="gray bold">Nro. de Registro Sanitario</td>
                    <td>{{ $seguimiento_tramite->rs_nro_registro }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha de Recojo</td>
                    <td>{{ $seguimiento_tramite->rs_fecha_recojo && $seguimiento_tramite->rs_fecha_recojo != '0000-00-00' ? date('d/m/Y', strtotime($seguimiento_tramite->rs_fecha_recojo)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="centreado dark_gray bold">CPP</td>
                </tr>
                <tr>
                    <td class="gray bold">Estado</td>
                    <td>{{ $seguimiento_tramite->cpp_estado }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Carta de Compromiso</td>
                    <td>{{ $seguimiento_tramite->cpp_carta }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Cite</td>
                    <td>{{ $seguimiento_tramite->cpp_cite }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="centreado dark_gray bold">Muestra</td>
                </tr>
                <tr>
                    <td class="gray bold">Estado</td>
                    <td>{{ $seguimiento_tramite->muestra_estado }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Carta de Compromiso</td>
                    <td>{{ $seguimiento_tramite->muestra_carta }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Cite</td>
                    <td>{{ $seguimiento_tramite->muestra_cite }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="centreado dark_gray bold">Desplegados</td>
                </tr>
                <tr>
                    <td class="gray bold">Estado</td>
                    <td>{{ $seguimiento_tramite->desplegado_estado }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Carta de Compromiso</td>
                    <td>{{ $seguimiento_tramite->desplegado_carta }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Cite</td>
                    <td>{{ $seguimiento_tramite->desplegado_cite }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="centreado dark_gray bold">GMP</td>
                </tr>
                <tr>
                    <td class="gray bold">Estado</td>
                    <td>{{ $seguimiento_tramite->gmp_estado }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Carta de Compromiso</td>
                    <td>{{ $seguimiento_tramite->gmp_carta }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Cite</td>
                    <td>{{ $seguimiento_tramite->gmp_cite }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="centreado dark_gray bold">Representación Legal</td>
                </tr>
                <tr>
                    <td class="gray bold">Estado</td>
                    <td>{{ $seguimiento_tramite->rl_estado }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Carta de Compromiso</td>
                    <td>{{ $seguimiento_tramite->rl_carta }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Cite</td>
                    <td>{{ $seguimiento_tramite->rl_cite }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha de Registro</td>
                    <td>{{ date('d/m/Y', strtotime($seguimiento_tramite->fecha_registro)) }}</td>
                </tr>
            </tbody>
        </table>
    @endforeach
</body>

</html>
