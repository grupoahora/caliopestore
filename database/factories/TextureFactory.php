<?php

namespace Database\Factories;

use App\Texture;
use Illuminate\Database\Eloquent\Factories\Factory;

class TextureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Texture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->randomElement([
                '/image/1637716116home3_static8.jpg',
            ]),
        ];
    }
}
