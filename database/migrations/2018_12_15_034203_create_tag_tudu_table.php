<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTuduTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_tudu', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('tag_id')->unsigned();
            $table->integer('tudu_id')->unsigned();

            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('tudu_id')->references('id')->on('tudus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_tudu');
    }
}
