<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CastMemberMovies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cast_member_movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_cast_member')->unsigned();
            $table->foreign('id_cast_member')->references('id')->on('cast_members');
            $table->integer('id_movies')->unsigned();
            $table->foreign('id_movies')->references('id')->on('movies');
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
        Schema::dropIfExists('cast_member_movies');
    }
}
