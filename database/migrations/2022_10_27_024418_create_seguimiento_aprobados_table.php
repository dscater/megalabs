<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoAprobadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_aprobados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("maestro_registro_id");
            $table->date("fecha_aprobacion");
            $table->string("estado_final");
            $table->string("archivo", 255);
            $table->text("observacion");
            $table->date("fecha_registro");
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
        Schema::dropIfExists('seguimiento_aprobados');
    }
}
