<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateResponsableCulteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable_culte', function (Blueprint $table) {
            $table->integer('responsable_id')->unsigned()->nullable();
            $table->foreign('responsable_id')->references('id')->on('responsables');
            $table->integer('culte_id')->unsigned()->nullable();
            $table->foreign('culte_id')->references('id')->on('cultes');
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
