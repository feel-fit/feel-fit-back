<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Discount;
use Faker\Generator as Faker;

$factory->define(Discount::class, function (Faker $faker) {
    return [
        'value' => $faker->numberBetween('10000', '20000'),
        'name' => $faker->name
    ];
});
