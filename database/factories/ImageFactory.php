<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    \Illuminate\Support\Facades\Storage::fake('avatars');

    return [
        'file' => \Illuminate\Http\UploadedFile::fake()->image('avatar.jpg'),
        'product_id' => \App\Models\Product::inRandomOrder()->first()->id,
        'position' => $faker->numberBetween(0, 10),
    ];
});
