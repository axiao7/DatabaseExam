<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerpaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('answerpaper', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic_content',200);
            $table->string('option_A',50);
            $table->string('option_B',50);
            $table->string('option_C',50);
            $table->string('option_D',50);
            $table->char('right_answer');
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
        Schema::drop('answerpaper');
    }
}
