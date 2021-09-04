<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'slug' => $faker->unique()->slug,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'icon' => $faker->randomElement(['icon-fruits',
        'icon-broccoli-1',
        'icon-beef',
        'icon-fast-food',
        'icon-honey',
        'icon-grape',
        'icon-onions',
        'icon-avocado',
        'icon-contain',
        'icon-fresh-juice',
        'icon-newsletter',
        'icon-organic',
        'icon-beer',]),
    ];
});
