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
            // 答卷答案
            $table->char('choice_1');
            $table->char('choice_2');
            $table->char('choice_3');
            $table->char('choice_4');
            $table->char('choice_5');
            $table->char('choice_6');
            $table->char('choice_7');
            $table->char('choice_8');
            $table->char('choice_9');
            $table->char('choice_10');
            $table->char('choice_11');
            $table->char('choice_12');
            $table->char('choice_13');
            $table->char('choice_14');
            $table->char('choice_15');
            $table->char('choice_16');
            $table->char('choice_17');
            $table->char('choice_18');
            $table->char('choice_19');
            $table->char('choice_20');
            $table->char('torf_1');
            $table->char('torf_2');
            $table->char('torf_3');
            $table->char('torf_4');
            $table->char('torf_5');
            $table->char('torf_6');
            $table->char('torf_7');
            $table->char('torf_8');
            $table->char('torf_9');
            $table->char('torf_10');
            $table->string('subject_1');
            $table->string('subject_2');
            $table->string('subject_3');
            $table->string('subject_4');
            $table->string('subject_5');

            $table->integer('total_score');
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
