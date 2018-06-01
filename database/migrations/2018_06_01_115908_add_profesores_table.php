<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_academia')->unsigned();
            $table->foreign('id_academia')->references('id')->on('users');
            $table->integer('id_preparador')->unsigned();
            $table->foreign('id_preparador')->references('id')->on('users');
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
        Schema::dropIfExists('profesores');
    }
}
