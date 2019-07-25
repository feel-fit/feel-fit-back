<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'user_id' => \App\Models\User::all()->random(1)->first()->id,
        'city_id' => \App\Models\City::all()->random(1)->first()->id, // password
    ];
});
