<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentvideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentvideos', function (Blueprint $table) {
            $table->increments('id_commentvideo');

            $table->string('descripcion',50);
            $table->integer('id_usuario');
            $table->integer('id_video');

/*
            $table->foreign('id_video')
                ->references('id_video')->on('videos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_usuario')
                ->references('id')->on('users')
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
        Schema::dropIfExists('commentvideos');
    }
}
