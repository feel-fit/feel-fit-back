<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Shopping;
use Faker\Generator as Faker;

$factory->define(Shopping::class, function (Faker $faker) {
    return [
        'status_order_id' => \App\Models\StatusOrder::all()->random()->first()->id,
        'user_id' => \App\Models\User::all()->random()->first()->id,
        'discount_id' => $faker->randomElement([\App\Models\Discount::all()->random()->first()->id, null]),
        'address_id' => $faker->randomElement([\App\Models\Address::all()->random()->first()->id, null]),
        'shipping_id' => $faker->randomElement([\App\Models\Shipping::all()->random()->first()->id, null]),
        'payment_id' => $faker->randomElement([\App\Models\Payment::all()->random()->first()->id, null]),
        'total' => $faker->numberBetween(100000, 300000)
    ];
});
