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
        $category = new Category();
        $category->name = $request->input('new-category');
        $category->save();

        return redirect()->route('categories.index');
    }

    public function filter(Request $request) 
    {
        $filter_category = $request->input('filter-categories');
        //dd($filter_category);
        return redirect()->route('blogs.index')->with('filter_category', $filter_category);
    }
}
