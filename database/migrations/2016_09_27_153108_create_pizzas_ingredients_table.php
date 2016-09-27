<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzasIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas_ingredients', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('pizza_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();

            $table->foreign('pizza_id')->references('id')->on('pizzas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pizzas_ingredients');
    }
}
