<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Spatie\Permission\Models\Permission;

$factory->define(Permission::class, function (Faker $faker) {
    return ['name'        => ucfirst($faker->word),];
});
