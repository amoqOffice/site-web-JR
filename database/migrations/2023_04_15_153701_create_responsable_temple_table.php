<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateResponsableTempleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable_temple', function (Blueprint $table) {
            $table->integer('responsable_id')->unsigned()->nullable();
            $table->foreign('responsable_id')->references('id')->on('responsables');
            $table->integer('temple_id')->unsigned()->nullable();
            $table->foreign('temple_id')->references('id')->on('temples');
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
