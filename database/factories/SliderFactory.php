<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    \Illuminate\Support\Facades\Storage::fake('avatars');

    return [
        'name' => $faker->word,
        'file' => \Illuminate\Http\UploadedFile::fake()->image('avatar.jpg'),
        'position' => $faker->numberBetween(0, 9),
    ];
});
