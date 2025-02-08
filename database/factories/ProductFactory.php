<?php

namespace Database\Factories;

use App\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->ean8,
            'name' => $this->faker->unique()->streetName,
            'slug' => $this->faker->unique()->slug,
            'stock' => $this->faker->buildingNumber,
            'short_description' => $this->faker->realText($maxNbChars = 300, $indexSize = 2),
            'long_description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'sell_price' => $this->faker->randomNumber(2),
            'status' => 'BOTH',
            'category_id' => rand(1, 10),
            'subcategory_id' => rand(1, 10),
        ];
    }
}
