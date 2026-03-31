<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\User;
use App\Models\Conversation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class ConversationUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'conversation_id' => Conversation::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
