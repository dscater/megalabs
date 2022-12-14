<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Maestro de Registros</title>
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

    @foreach ($maestro_registros as $maestro_registro)
        <table border="1">
            <tbody>
                <tr>
                    <td class="dark_gray bold" width="28%">Instituci??n</td>
                    <td class="dark_gray bold">{{ $maestro_registro->institucion }}</td>
                </tr>
                <tr>
                    <td class="dark_gray bold">C??digo Producto</td>
                    <td class="dark_gray bold">{{ $maestro_registro->codigo_producto }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Descripci??n de Figura en el RS</td>
                    <td>{{ $maestro_registro->descripcion_figura_rs }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Descripci??n SAC</td>
                    <td>{{ $maestro_registro->descripcion_sac }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Comercializado</td>
                    <td>{{ $maestro_registro->comercializado }}</td>
                </tr>
                <tr>
                    <td class="gray bold">N??mero de RS o NSO/Senasag</td>
                    <td>{{ $maestro_registro->numero_rs }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha de Emisi??n RS</td>
                    <td>{{ $maestro_registro->fecha_emision_rs && $maestro_registro->fecha_emision_rs != '0000-00-00' ? date('d/m/Y', strtotime($maestro_registro->fecha_emision_rs)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha Vencimiento del RS</td>
                    <td>{{ $maestro_registro->fecha_vencimiento_rs && $maestro_registro->fecha_vencimiento_rs != '0000-00-00' ? date('d/m/Y', strtotime($maestro_registro->fecha_vencimiento_rs)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td class="gray bold">D??as a Vencer</td>
                    <td>{{ $maestro_registro->dias_vencer }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Estado del Registro Sanitario</td>
                    <td>{{ $maestro_registro->estado_sanitario }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Actualizaci??n</td>
                    <td>{{ $maestro_registro->actualizacion }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Condici??n del Registro Sanitario</td>
                    <td>{{ $maestro_registro->condicion_sanitario }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Propiedad seg??n lanzamiento y comercializaci??n</td>
                    <td>{{ $maestro_registro->propiedad_lc }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Prioridad</td>
                    <td>{{ $maestro_registro->prioridad }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Responsable</td>
                    <td>{{ $maestro_registro->responsable }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha de Revisi??n por Analistas Bolivia</td>
                    <td>{{ $maestro_registro->fecha_revision_ab && $maestro_registro->fecha_revision_ab != '0000-00-00' ? date('d/m/Y', strtotime($maestro_registro->fecha_revision_ab)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha Tentativa de Presentaci??n AGEMED</td>
                    <td>{{ $maestro_registro->fecha_tentativa_agemed && $maestro_registro->fecha_tentativa_agemed != '0000-00-00' ? date('d/m/Y', strtotime($maestro_registro->fecha_tentativa_agemed)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha Tentativa de Respuesta AGEMED</td>
                    <td>{{ $maestro_registro->fecha_respuesta_agemed && $maestro_registro->fecha_respuesta_agemed != '0000-00-00' ? date('d/m/Y', strtotime($maestro_registro->fecha_respuesta_agemed)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td class="gray bold">Primera Fecha de Resoluci??n Observado</td>
                    <td>{{ $maestro_registro->primera_fecha_ro && $maestro_registro->primera_fecha_ro != '0000-00-00' ? date('d/m/Y', strtotime($maestro_registro->primera_fecha_ro)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td class="gray bold">Segunda Fecha de Resoluci??n Observado</td>
                    <td>{{ $maestro_registro->segunda_fecha_ro && $maestro_registro->segunda_fecha_ro != '0000-00-00' ? date('d/m/Y', strtotime($maestro_registro->segunda_fecha_ro)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha Tentativa de Propuesta</td>
                    <td>{{ $maestro_registro->fecha_tentativa_p && $maestro_registro->fecha_tentativa_p != '0000-00-00' ? date('d/m/Y', strtotime($maestro_registro->fecha_tentativa_p)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha Estimada de Observaci??n RS2</td>
                    <td>{{ $maestro_registro->fecha_estimada_o_rs2 && $maestro_registro->fecha_estimada_o_rs2 != '0000-00-00' ? date('d/m/Y', strtotime($maestro_registro->fecha_estimada_o_rs2)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td class="gray bold">Comentarios Para Registro</td>
                    <td>{{ $maestro_registro->comentarios_registro }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Presentaci??n Planificaci??n</td>
                    <td>{{ $maestro_registro->comentarios_planificacion }}</td>
                </tr>
                <tr>
                    <td class="gray bold">GDP</td>
                    <td>{{ $maestro_registro->gdp }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Presentaci??n Comercial</td>
                    <td>{{ $maestro_registro->presentacion_comercial }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Presentaci??n del RS</td>
                    <td>{{ $maestro_registro->presentacion_rs }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Origen del RS</td>
                    <td>{{ $maestro_registro->origen_rs }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Fabricante</td>
                    <td>{{ $maestro_registro->fabricante }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Para</td>
                    <td>{{ $maestro_registro->para }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Bajo Licencia</td>
                    <td>{{ $maestro_registro->bajo_licencia }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha de Rectificaci??n</td>
                    <td>{{ $maestro_registro->fecha_rectificacion && $maestro_registro->fecha_rectificacion != '0000-00-00' ? date('d/m/Y', strtotime($maestro_registro->fecha_rectificacion)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td class="gray bold">Principio Activo</td>
                    <td>{{ $maestro_registro->principio_activo }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Concentraci??n</td>
                    <td>{{ $maestro_registro->concentracion }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Forma Farmac??utica/Cosm??tica Seg??n RS</td>
                    <td>{{ $maestro_registro->forma_farmaceutica_rs }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Forma Farmac??utica Armonizada</td>
                    <td>{{ $maestro_registro->forma_farmaceutica_amornizada }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Formula Cualitativa Cuantitativa</td>
                    <td>{{ $maestro_registro->formula_cc }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Venta por Ventanilla</td>
                    <td>{{ $maestro_registro->venta_ventanilla }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Condici??n de Venta</td>
                    <td>{{ $maestro_registro->condicion_venta }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Contacto T??cnico</td>
                    <td>{{ $maestro_registro->contacto_tecnico }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Vida ??til Meses</td>
                    <td>{{ $maestro_registro->vida_util }}</td>
                </tr>
                <tr>
                    <td class="gray bold">ATQ</td>
                    <td>{{ $maestro_registro->atq }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Condici??n de Almacenamiento</td>
                    <td>{{ $maestro_registro->condicion_almacenamiento }}</td>
                </tr>
                <tr>
                    <td class="gray bold">L??nea de Estucher??a</td>
                    <td>{{ $maestro_registro->linea_estucheria }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha Inicio de Comercializaci??n</td>
                    <td>{{ $maestro_registro->fecha_inicio_comercializacion && $maestro_registro->fecha_inicio_comercializacion != '0000-00-00' ? date('d/m/Y', strtotime($maestro_registro->fecha_inicio_comercializacion)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td class="gray bold">Producto Licitaci??n</td>
                    <td>{{ $maestro_registro->producto_licitacion }}</td>
                </tr>
                <tr>
                    <td class="gray bold">Fecha de Registro</td>
                    <td>{{ date('d/m/Y', strtotime($maestro_registro->fecha_registro)) }}</td>
                </tr>
            </tbody>
        </table>
    @endforeach
</body>

</html>
