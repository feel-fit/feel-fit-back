<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailShoppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_shoppings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('shopping_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('value');
            $table->unsignedTinyInteger('quantity');
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
        Schema::dropIfExists('detail_shoppings');
    }
}
