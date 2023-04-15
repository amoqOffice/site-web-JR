<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateRubriqueEnseignementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubrique_enseignement', function (Blueprint $table) {
            $table->integer('rubrique_id')->unsigned()->nullable();
            $table->foreign('rubrique_id')->references('id')->on('rubriques');
            $table->integer('enseignement_id')->unsigned()->nullable();
            $table->foreign('enseignement_id')->references('id')->on('enseignements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        # code...
    }
}
