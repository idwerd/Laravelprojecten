<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('blogs.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $category = new Category();
        $category->name = $request->input('new-category');
        $category->save();

        return redirect()->route('categories.index');
    }
}
