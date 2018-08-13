<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('titre');
            $table->string('objectif')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();

            $table->integer('domaine_id')->unsigned()->nullable();
            $table->foreign('domaine_id')->references('id')->on('domaine');

            $table->boolean('professionnel')->nullable();
            $table->integer('dure')->unsigned()->nullable();

            $table->integer('nb_personne')->unsigned()->nullable();

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
        Schema::dropIfExists('projects');
    }
}
