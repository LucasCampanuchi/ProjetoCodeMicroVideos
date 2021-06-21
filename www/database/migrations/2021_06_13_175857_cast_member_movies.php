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
        Schema::create('cast_members_movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_cast_member');
            $table->integer('id_movies');


            $table->foreign('id_cast_member')->references('id')->on('cast_members');
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
        Schema::dropIfExists('cast_members_movies');
    }
}
