<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheludesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheludes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('day')->unique();
            $table->time('morning_start');
            $table->time('morning_end');
            $table->time('evening_start');
            $table->time('evening_end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheludes');
    }
}
