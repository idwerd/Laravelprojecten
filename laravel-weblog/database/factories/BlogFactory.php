<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(5),
            'body' => $this->faker->paragraphs(5, true),
            //'category_id' => Category::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'premium' => $this->faker->boolean(),
        ];
    }
}
