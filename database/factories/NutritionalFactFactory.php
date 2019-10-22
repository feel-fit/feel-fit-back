<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Models\NutritionalFact;

$factory->define(NutritionalFact::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'quantity' => $faker->numberBetween(10, 100),
        'percentage' => $faker->numberBetween(10, 100),
        'order' => $faker->numberBetween(0, 10),
        'product_id' => \App\Models\Product::inRandomOrder()->first()->id,
        'parent_id' => $faker->optional()->numberBetween(1, 10),
        'position_fact' => $faker->randomElement(['top', 'superior', 'medio', 'inferior']),

    ];
});
