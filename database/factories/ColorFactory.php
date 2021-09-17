<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Color;
use Faker\Generator as Faker;

$factory->define(Color::class, function (Faker $faker) {

    return [
        'name' => $faker->unique()->word,
        'slug' => $faker->unique()->slug,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});