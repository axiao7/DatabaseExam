<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTorfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('torf', function (Blueprint $table) {
            //
            $table->string('topic_content',200)-> change();
            $table->char('right_answer',5)-> change();
            $table->char('difficulty',5)-> change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('torf', function (Blueprint $table) {
            //
        });
    }
}
