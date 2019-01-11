<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentworks', function (Blueprint $table) {
            $table->increments('id_commentwork');

            $table->string('descripcion',50);
            $table->integer('id_usuario');
            $table->integer('id_workalbum');

/*
            $table->foreign('id_workalbum')
                ->references('id_workalbum')->on('workalbums')
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
        Schema::dropIfExists('commentworks');
    }
}
