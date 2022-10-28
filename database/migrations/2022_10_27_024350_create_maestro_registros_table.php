<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaestroRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestro_registros', function (Blueprint $table) {
            $table->id();
            $table->string("institucion", 255);
            $table->string("codigo_producto", 255)->nullable();
            $table->string("descripcion_figura_rs", 255);
            $table->string("descripcion_sac", 255)->nullable();
            $table->string("comercializado", 255)->nullable();
            $table->string("numero_rs", 255)->nullable();
            $table->date("fecha_emision_rs")->nullable();
            $table->date("fecha_vencimiento_rs")->nullable();
            $table->integer("dias_vencer")->nullable();
            $table->string("estado_sanitario", 255)->nullable();
            $table->string("actualizacion", 255)->nullable();
            $table->string("condicion_sanitario", 255)->nullable();
            $table->string("propiedad_lc", 255)->nullable();
            $table->string("prioridad", 255)->nullable();
            $table->string("responsable", 255)->nullable();
            $table->date("fecha_revision_ab")->nullable();
            $table->date("fecha_tentativa_agemed")->nullable();
            $table->date("fecha_respuesta_agemed")->nullable();
            $table->date("primera_fecha_ro")->nullable();
            $table->date("segunda_fecha_ro")->nullable();
            $table->date("fecha_tentativa_p")->nullable();
            $table->date("fecha_estimada_o_rs2")->nullable();
            $table->text("comentarios_registro")->nullable();
            $table->text("comentarios_planificacion")->nullable();
            $table->string("gdp", 255)->nullable();
            $table->string("presentacion_comercial", 255)->nullable();
            $table->string("presentacion_rs", 255)->nullable();
            $table->string("origen_rs", 255)->nullable();
            $table->string("fabricante", 255)->nullable();
            $table->string("para", 255)->nullable();
            $table->string("bajo_licencia", 255)->nullable();
            $table->date("fecha_rectificacion", 255)->nullable();
            $table->string("principio_activo", 255)->nullable();
            $table->string("concentracion", 255)->nullable();
            $table->string("forma_farmaceutica_rs", 255)->nullable();
            $table->string("forma_farmaceutica_amornizada", 255)->nullable();
            $table->string("formula_cc", 255)->nullable();
            $table->string("venta_ventanilla", 255)->nullable();
            $table->string("condicion_venta", 255)->nullable();
            $table->string("contacto_tecnico", 255)->nullable();
            $table->string("vida_util", 255)->nullable();
            $table->string("atq", 255)->nullable();
            $table->string("condicion_almacenamiento", 255)->nullable();
            $table->string("linea_estucheria", 255)->nullable();
            $table->date("fecha_inicio_comercializacion", 255)->nullable();
            $table->string("producto_licitacion", 255)->nullable();
            $table->date("fecha_registro", 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maestro_registros');
    }
}
