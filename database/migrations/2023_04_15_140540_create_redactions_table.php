*<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->text('description');
            $table->string('lieu');
            $table->string('image');
            $table->string('type');
            $table->date('date_publication');
            $table->boolean('is_published')->default(false);
            $table->string('audio_path')->nullable();
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
        Schema::dropIfExists('redactions');
    }
}
