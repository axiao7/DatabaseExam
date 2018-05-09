<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterChoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('choice', function (Blueprint $table) {
            //
            $table->string('option_A',100)-> change();
            $table->string('option_B',100)-> change();
            $table->string('option_C',100)-> change();
            $table->string('option_D',100)-> change();
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
        Schema::table('choice', function (Blueprint $table) {
            //
        });
    }
}
