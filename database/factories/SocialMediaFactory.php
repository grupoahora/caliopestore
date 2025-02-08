<?php

namespace Database\Factories;

use App\SocialMedia;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocialMediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SocialMedia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $name = $this->faker->unique()->randomElement([
                'facebook',
                'instagram',
                'youtube',
            ]),
            'url' => 'https://'.$name.'.com/',
            'icon' => 'fa-'.$name,
            'business_id' => 1,
        ];
    }
}
