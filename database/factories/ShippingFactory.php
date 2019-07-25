<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Shipping;
use Faker\Generator as Faker;

$factory->define(Shipping::class, function (Faker $faker) {
    return [
        'value' => $faker->numberBetween(0, 10000),
        'transporter' => $faker->name,
        'track' => $faker->optional()->creditCardNumber
    ];
});
