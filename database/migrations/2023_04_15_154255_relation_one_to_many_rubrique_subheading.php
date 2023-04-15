<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class RelationOneToManyRubriqueSubheading extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subheadings', function (Blueprint $table) {
            $table->unsignedInteger('rubrique_id')->nullable();
            $table->foreign('rubrique_id')->references('id')->on('rubriques')->onDelete('cascade');
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
