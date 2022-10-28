<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_tramites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("maestro_registro_id");
            $table->string("responsable", 255)->nullable();
            $table->string("tipo_tramite", 255)->nullable();
            $table->date("fecha_ingreso")->nullable();
            $table->string("codigo_misa", 255)->nullable();
            $table->string("hora_ruta", 255)->nullable();
            $table->string("ameged_estado", 255)->nullable();
            $table->date("ameged_fecha", 255)->nullable();
            $table->string("megalabs_estado", 255)->nullable();
            $table->date("megalabs_fecha", 255)->nullable();
            $table->date("rs_fecha_aprobacion")->nullable();
            $table->string("rs_nro_registro")->nullable();
            $table->date("rs_fecha_recojo")->nullable();
            $table->string("cpp_estado")->nullable();
            $table->text("cpp_carta", 255)->nullable();
            $table->string("cpp_cite", 255)->nullable();
            $table->string("cpp_archivo", 255)->nullable();
            $table->string("muestra_estado")->nullable();
            $table->text("muestra_carta", 255)->nullable();
            $table->string("muestra_cite", 255)->nullable();
            $table->string("muestra_archivo", 255)->nullable();
            $table->string("desplegado_estado")->nullable();
            $table->text("desplegado_carta")->nullable();
            $table->string("desplegado_cite")->nullable();
            $table->string("desplegado_archivo")->nullable();
            $table->string("gmp_estado")->nullable();
            $table->text("gmp_carta")->nullable();
            $table->string("gmp_cite", 255)->nullable();
            $table->string("gmp_archivo", 255)->nullable();
            $table->string("rl_estado")->nullable();
            $table->text("rl_carta")->nullable();
            $table->string("rl_cite", 255)->nullable();
            $table->string("rl_archivo", 255)->nullable();
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
        Schema::dropIfExists('seguimiento_tramites');
    }
}
