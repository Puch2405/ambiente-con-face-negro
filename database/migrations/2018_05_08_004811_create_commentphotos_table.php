<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentphotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentphotos', function (Blueprint $table) {
            $table->increments('id_commentphoto');

            $table->string('descripcion',50);
            $table->integer('id_usuario');
            $table->integer('id_album');
/*
            $table->foreign('id_album')
                ->references('id_album')->on('albums')
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
        Schema::dropIfExists('commentphotos');
    }
}
