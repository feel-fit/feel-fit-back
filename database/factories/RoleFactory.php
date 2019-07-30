<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Spatie\Permission\Models\Role;

$factory->define(Role::class, function (Faker $faker) {
    return ['name'        => ucfirst($faker->word),];
});
