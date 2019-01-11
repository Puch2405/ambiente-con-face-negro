<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id_work');

            $table->string('archivo',128);
            $table->integer('estado');
            $table->integer('id_workalbum');
            $table->integer('prioridad');

/*
            $table->foreign('id_tamano')->references('id_tamano')->on('tamano')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_workalbum')
                ->references('id_workalbum')->on('workalbums')
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
        Schema::dropIfExists('works');
    }
}
