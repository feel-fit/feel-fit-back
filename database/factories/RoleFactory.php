<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Role::class, function (Faker $faker) {
    return ['name'        => ucfirst($faker->word)];
});
