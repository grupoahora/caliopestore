<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Texture;

$factory->define(Texture::class, function (Faker $faker) {
return [
        'url' => $faker->randomElement([
            '/image/1637716116home3_static8.jpg',
            

        ])
    ];
});
