<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id_album');

            $table->string('Titulo',1000);
            $table->string('archivo',128);
            $table->integer('estado');
/*
            $table->foreign('id_tamano')->references('id_tamano')->on('tamano')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                */

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
        Schema::dropIfExists('albums');
    }
}
