<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'user_id' => \App\Models\User::all()->random()->first()->id,
        'name' => $faker->name,
        'email' => $faker->email,
        'description' => $faker->sentence
    ];
});
