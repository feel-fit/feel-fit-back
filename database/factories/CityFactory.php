<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'department_id' => \App\Models\Department::inRandomOrder()->first()->id
    ];
});
