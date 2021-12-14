<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SocialMedia;
use Faker\Generator as Faker;

$factory->define(SocialMedia::class, function (Faker $faker) {
    return [
        
        'name' =>  $name = $faker->unique()->randomElement([
            'facebook',
            
            'instagram',
            'youtube',
            
        ]),
        'url' => 'https://'.$name.'.com/',
        'icon' => 'fa-'.$name,
        /* $faker->unique()->randomElement([
            'fa-facebook',
            'fa-twitter',
            'fa-instagram',
            'fa-google-plus',
            'fa-youtube',

        ]), */
        'business_id' => 1,
    ];
});
