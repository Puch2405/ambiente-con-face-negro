<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecorridoalbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recorridoalbums', function (Blueprint $table) {
            $table->increments('id_recorridoalbum');

            $table->string('titulo',1000);
            $table->string('descripcion',10000);
            $table->string('archivo',128);
            $table->integer('estado');

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
        Schema::dropIfExists('recorridoalbums');
    }
}
