<?php

namespace Database\Factories;

use App\Models\Advert;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Advert>
 */
class AdvertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->text(250),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'image' => '',
            'promote' => $this->faker->boolean(),
        ];
    }
}
