<?php

namespace Database\Factories;

use App\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->randomElement([
                '/image/product-s-1.jpg',
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
            ]),
        ];
    }
}
