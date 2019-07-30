<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Models\DetailShopping;

$factory->define(DetailShopping::class, function (Faker $faker) {
    return [
        'shopping_id' => \App\Models\Shopping::inRandomOrder()->first()->id,
        'product_id' => \App\Models\Product::inRandomOrder()->first()->id,
        'value' => $faker->numberBetween('10000', '200000'),
        'quantity' => $faker->numberBetween('1', '8')
    ];
});
