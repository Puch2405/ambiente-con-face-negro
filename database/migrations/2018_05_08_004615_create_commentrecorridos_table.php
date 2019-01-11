<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentrecorridosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentrecorridos', function (Blueprint $table) {
            $table->increments('id_commentrecorridos');

            $table->string('descripcion',50);
            $table->integer('id_usuario');
            $table->integer('id_recorridoalbum');

/*
            $table->foreign('id_recorridoalbum')
                ->references('id_recorridoalbum')->on('recorridoalbums')
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
        Schema::dropIfExists('commentrecorridos');
    }
}
