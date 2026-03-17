<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Category;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = Blog::all();
        $categories = Category::all();

        foreach($blogs as $blog) {
            $blog->category()->attach($categories->random(rand(1, 3))->pluck('id'));
        }
    }
}
