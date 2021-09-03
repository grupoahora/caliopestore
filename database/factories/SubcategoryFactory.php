<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Subcategory;

$factory->define(Subcategory::class, function (Faker $faker) {
    return [
        'category_id' => rand(1, 10),
        'name' => $faker->unique()->word,
        'slug' => $faker->unique()->slug,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
