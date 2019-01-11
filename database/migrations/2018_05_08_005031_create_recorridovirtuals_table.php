<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecorridovirtualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recorridovirtuals', function (Blueprint $table) {
            $table->increments('id_recorridovirtual');

            $table->string('archivo',1000);
            $table->integer('estado');
            $table->integer('tipo_content');
            $table->integer('id_workalbum');

/*
            $table->foreign('id_tamano')->references('id_tamano')->on('tamano')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_recorridoalbum')
                ->references('id_recorridoalbum')->on('recorridoalbums')
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
        Schema::dropIfExists('recorridovirtuals');
    }
}
