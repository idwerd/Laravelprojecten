<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => $this->faker->text(50),
            'book_id' => Book::inRandomOrder()->first()->id,
        ];
    }
}
