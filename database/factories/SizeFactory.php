<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Size;
use Faker\Generator as Faker;

$factory->define(Size::class, function (Faker $faker) {

    return [
        'name' => $faker->unique()->word,
        'slug' => $faker->unique()->slug,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
