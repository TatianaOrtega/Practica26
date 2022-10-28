<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscripcions', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->bigIncrements('id_suscripcion');
            $table->string('estado');
            $table->bigInteger('id_curso')->unsigned();
            $table->bigInteger('id_consumidor')->unsigned();
            $table->timestamps();

            $table->foreign('id_curso')->references('id_curso')->on('cursos')->onDelete("cascade");
            $table->foreign('id_consumidor')->references('id_usuario')->on('usuarios')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suscripcions');
    }
};
