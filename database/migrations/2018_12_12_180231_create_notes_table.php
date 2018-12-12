<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');
            $table->integer('notable_id')->unsigned();
            $table->string('notable_type'); //tipo del model a referenciar: 'App\Model'
            //LA SIGUIENTE LINEA ES LA MANERA DE HACER RELACIONES ENTRE TABLAS
            //$table->foreign('message_id')->references('id')->on('messages');
            //NO SIEMPRE ES NECESARIO DECLARAR LAS RELACIONES EN LA MISMA BDD, SE PUEDE IMPLEMENTAR EL MISMO COMPORTAMIENTO DESDE EL CODIGO
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
        Schema::dropIfExists('notes');
    }
}
