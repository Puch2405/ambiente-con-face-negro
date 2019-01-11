<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id_photo');

            $table->string('titulo',1000);
            $table->string('descripcion',1000);
            $table->string('archivo',128);
            $table->integer('id_album');
            $table->integer('estado');
/*
            $table->foreign('id_album')->references('id_album')->on('albums')
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('photos');
    }
}
