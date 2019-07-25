<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => \App\Models\Category::all()->random()->first()->id,
        'name'=>$faker->word,
        'description'=>$faker->paragraph,
        'price'=>$faker->numberBetween(10000,200000),
        'surprise_box'=>$faker->boolean
    ];
});
