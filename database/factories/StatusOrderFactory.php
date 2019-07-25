<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\StatusOrder;
use Faker\Generator as Faker;

$factory->define(StatusOrder::class, function (Faker $faker) {
    return [
        'name'=>$faker->word
    ];
});
