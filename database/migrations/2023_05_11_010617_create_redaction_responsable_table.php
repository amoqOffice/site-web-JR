<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateRedactionResponsableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redaction_responsable', function (Blueprint $table) {
            $table->integer('redaction_id')->unsigned()->nullable();
            $table->foreign('redaction_id')->references('id')->on('redactions');
            $table->integer('responsable_id')->unsigned()->nullable();
            $table->foreign('responsable_id')->references('id')->on('responsables');
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
