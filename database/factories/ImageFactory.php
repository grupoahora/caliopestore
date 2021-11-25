<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Image;

$factory->define(Image::class, function (Faker $faker) {
return [
        'url' => $faker->randomElement(['/image/product-s-1.jpg',
            '/image/product-s-2.jpg',
            '/image/product-s-3.jpg',
            '/image/product-s-4.jpg',
            '/image/product-s-5.jpg',
            '/image/product-s-6.jpg',
            '/image/product-s-2.jpg',
            '/image/product-s-3.jpg',
            '/image/product-s-4.jpg',
            '/image/product-s-5.jpg',
            '/image/product-s-6.jpg',
            '/image/product-s-2.jpg',
            '/image/product-s-3.jpg',
            '/image/product-s-4.jpg',
            '/image/product-s-5.jpg',
            '/image/product-s-6.jpg',
            '/image/product-s-2.jpg',
            '/image/product-s-3.jpg',
            '/image/product-s-4.jpg',
            '/image/product-s-5.jpg',
            '/image/product-s-6.jpg',
            '/image/product-s-2.jpg',
            '/image/product-s-3.jpg',
            '/image/product-s-4.jpg',
            '/image/product-s-5.jpg',
            '/image/product-s-6.jpg',

        ])
    ];
});
