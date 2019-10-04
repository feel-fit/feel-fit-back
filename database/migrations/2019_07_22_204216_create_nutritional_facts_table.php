<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNutritionalFactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutritional_facts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('quantity')->nullable();
            $table->string('percentage')->nullable();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('order')->default(0);
            $table->unsignedInteger('parent_id')->nullable();
            $table->enum('position_fact', ['top','superior', 'medio', 'inferior'])->default('inferior');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutritional_facts');
    }
}
