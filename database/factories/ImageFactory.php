<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'url' => $faker->imageUrl(1000, 1000),
        'product_id' => \App\Models\Product::inRandomOrder()->first()->id,
        'position' => $faker->numberBetween(0, 10),
    ];
});
