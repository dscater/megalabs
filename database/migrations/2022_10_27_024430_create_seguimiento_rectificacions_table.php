<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoRectificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_rectificacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("maestro_registro_id");
            $table->string("responsable", 255)->nullable();
            $table->string("tipo_tramite", 255)->nullable();
            $table->date("fecha_ingreso")->nullable();
            $table->string("codigo_misa", 255)->nullable();
            $table->string("hoja_ruta", 255)->nullable();
            $table->text("motivo_rectificacion")->nullable();
            $table->string("agemed_estado", 255)->nullable();
            $table->string("agemed_observacion", 255)->nullable();
            $table->date("agemed_fecha")->nullable();
            $table->string("megalabs_estado", 255)->nullable();
            $table->date("megalabs_fecha")->nullable();
            $table->date("rs_fecha")->nullable();
            $table->string("rs_nro_registro", 255)->nullable();
            $table->date("rs_fecha_recojo")->nullable();
            $table->date("fecha_registro")->nullable();
            $table->timestamps();

            $table->foreign("maestro_registro_id")->on("maestro_registros")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguimiento_rectificacions');
    }
}
