<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('status_order_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('discount_id')->nullable();
            $table->unsignedInteger('address_id');
            $table->unsignedInteger('shipping_id')->nullable();
            $table->unsignedInteger('payment_id')->nullable();
            $table->unsignedInteger('total');
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
        Schema::dropIfExists('shoppings');
    }
}
