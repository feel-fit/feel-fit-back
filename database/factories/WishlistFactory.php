<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Product;
use App\Models\Wishlist;
use Faker\Generator as Faker;

$factory->define(Wishlist::class, function (Faker $faker) {
    return [
        'product_id' => Product::inRandomOrder()->first()->id,
        'user_id' => \App\Models\User::inRandomOrder()->first()->id
    ];
});
