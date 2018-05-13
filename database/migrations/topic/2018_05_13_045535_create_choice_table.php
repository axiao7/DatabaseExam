<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('choice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic_content');
            $table->string('option_A');
            $table->string('option_B');
            $table->string('option_C');
            $table->string('option_D');
            $table->char('right_answer',2);
            $table->char('difficulty',2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('choice');
    }
}
