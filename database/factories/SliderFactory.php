<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'url' => $faker->imageUrl('1000', '400'),
        'position' => $faker->numberBetween(0, 9)
    ];
});
