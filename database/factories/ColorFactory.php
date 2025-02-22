<?php
// database/factories/ColorFactory.php
namespace Database\Factories;

use App\Color; // Asegúrate de que el namespace sea correcto
use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Color::class;

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
        ];
    }
}
