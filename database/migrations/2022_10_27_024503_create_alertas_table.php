<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alertas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("maestro_registro_id");
            $table->string("descripcion", 255);
            $table->date("fecha");
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
        Schema::dropIfExists('alertas');
    }
}
