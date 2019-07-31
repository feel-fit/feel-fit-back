<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Permission::class, function (Faker $faker) {
    return ['name'        => ucfirst($faker->word)];
});
