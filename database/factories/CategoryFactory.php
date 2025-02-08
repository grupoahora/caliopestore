<?php

namespace Database\Factories;

use App\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'icon' => $this->faker->randomElement([
                'icon-fruits',
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
                'icon-beer',
            ]),
        ];
    }
}
