<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkalbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workalbums', function (Blueprint $table) {
            $table->increments('id_workalbum');

            $table->string('titulo',1000);
            $table->string('archivo',128);
            $table->string('titulov',1000);
            $table->string('link',1000);
            $table->string('descripcion',10000);
            $table->integer('estado');
            $table->string('cordenada',128);

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
        Schema::dropIfExists('workalbums');
    }
}
