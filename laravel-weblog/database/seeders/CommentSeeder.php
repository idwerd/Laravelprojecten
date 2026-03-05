<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentSeeder extends Seeder
{

    use HasFactory;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::factory()->count(20)->create();
    }

    
}
