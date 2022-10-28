<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("maestro_registro_id");
            $table->string("referencia", 255);
            $table->text("descripcion")->nullable();
            $table->string("archivo", 255)->nullable();
            $table->date("fecha");
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
        Schema::dropIfExists('notas');
    }
}
