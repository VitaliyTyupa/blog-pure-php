<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articles>
 */
class ArticleFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  
  public function definition(): array
  {
    return [
      'name' => $this->faker->realText($maxNbChars = 10, $indexSize = 4),
      'artic_categ_id_ref' => $this->faker->numberBetween(1, 7),
      'artic_desc' => $this->faker->realText($maxNbChars = 200, $indexSize = 4),
      'artic_bild' => $this->faker->imageUrl(600, 600, 'animals', true, 'dogs', true, 'jpg'),
      'artic_tn_bild' => $this->faker->imageUrl(250, 250, 'animals', true, 'dogs', true, 'jpg'),
    ];
  }
}
