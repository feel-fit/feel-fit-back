<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\City;
use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'user_id' => \App\Models\User::inRandomOrder()->first()->id,
        'city_id' => City::inRandomOrder()->first()->id, // password
    ];
});
