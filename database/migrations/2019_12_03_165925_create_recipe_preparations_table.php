<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipePreparationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_preparations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('order');
            $table->string('title')->nullable();
            $table->text('description');
            $table->unsignedBigInteger('recipe_id');
            $table->timestamps();

            $table->foreign('recipe_id')
                ->references('id')->on('recipes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_preparations');
    }
}
