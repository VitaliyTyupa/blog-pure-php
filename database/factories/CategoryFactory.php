<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categories>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'categ_name' => $this->faker->realText($maxNbChars = 10, $indexSize = 4),
          'categ_desc' => $this->faker->realText($maxNbChars = 100, $indexSize = 4),  
        ];
    }
}
