*<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('description')->nullable();
            $table->string('pays');
            $table->string('image')->nullable();
            $table->string('lien_youtube')->nullable();
            $table->string('type');
            $table->date('date_debut_activite');
            $table->date('date_fin_activite');
            $table->date('date_publication');
            $table->boolean('is_published');
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
        Schema::dropIfExists('activites');
    }
}
