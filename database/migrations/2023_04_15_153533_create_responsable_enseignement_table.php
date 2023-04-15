<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateResponsableEnseignementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable_enseignement', function (Blueprint $table) {
            $table->integer('responsable_id')->unsigned()->nullable();
            $table->foreign('responsable_id')->references('id')->on('responsables');
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
