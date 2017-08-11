<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('food_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('food_name');
            $table->integer('serving_size');
            $table->integer('calories');
            $table->integer('fat');
            $table->integer('cholesterol');
            $table->integer('sodium');
            $table->integer('carbohydrates');
            $table->integer('sugar');
            $table->integer('protein');
            $table->integer('calcium');
            $table->integer('iron');
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
        Schema::drop('food_information');
    }
}
