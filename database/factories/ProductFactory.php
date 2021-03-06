<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Brand;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->word;

    return ['name'        => $name,
            'description' => $faker->paragraph,
            'price'       => $faker->numberBetween(10000, 200000),
            'status'      => $faker->boolean,
            'in_stock'    => $faker->boolean,
            'brand_id'    => Brand::all()->random()->first()->id,
            'quantity'    => $faker->numberBetween(0, 10),
            'slug'        => str_slug($name), ];
});
