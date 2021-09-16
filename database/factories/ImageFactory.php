<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Image;

$factory->define(Image::class, function (Faker $faker) {
return [
        'url' => $faker->imageUrl($width = 640, $height = 480),
        'imageable_type' => $faker->streetName,
        'imageable_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
