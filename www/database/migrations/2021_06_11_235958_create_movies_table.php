<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->text('synopsis');
            $table->uuid('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categories');
            $table->integer('id_genres');
            $table->foreign('id_genres')->references('id')->on('genres');
            $table->softDeletes();
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
        Schema::dropIfExists('movies');
    }
}
