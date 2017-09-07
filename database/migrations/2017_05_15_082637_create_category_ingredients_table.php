<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

        });

        Schema::table('ingredients', function(Blueprint $table) {
            $table->integer('category_ingredients_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_ingredients');
    }
}
