<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Conversation; 

class ConversationUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $conversations = Conversation::all();
        
        foreach($conversations as $conversation) {
            $conversation->users()->attach($users->random(rand(2, 2))->pluck('id'));
        }
    }
}
