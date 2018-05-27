<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('preparador')->unsigned();
            $table->foreign('preparador')->references('id')->on('users');
            $table->integer('oposicion')->unsigned();
            $table->foreign('oposicion')->references('id')->on('oposiciones');
            $table->string('descripcion');
            $table->decimal('precio',3,2);
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
        Schema::dropIfExists('cursos');
    }
}
