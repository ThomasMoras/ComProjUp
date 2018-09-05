<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAskMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('askMember', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('ask_user')->unsigned()->nullable();
            $table->foreign('ask_user')->references('id')->on('users');

            $table->integer('receive_user')->unsigned()->nullable();
            $table->foreign('receive_user')->references('id')->on('users');

            $table->boolean('accept')->nullable();

            $table->integer('poste_id')->unsigned()->nullable();
            $table->foreign('poste_id')->references('id')->on('members');

            $table->rememberToken();
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
        Schema::dropIfExists('askMember');
    }
}
