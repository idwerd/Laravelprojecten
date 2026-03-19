<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBlogRequest;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        !$user || $user->premium === 0 ? $blogs = Blog::where('premium', '0')->orderBy('created_at', 'desc')->get() : $blogs = Blog::orderBy('created_at', 'desc')->get();
    
        $categories = Category::all();
        
        return view('blogs.index', compact('blogs', 'categories'));
    }
    
    
    public function premium()
    {
        $user = Auth::user();

        $blogs = Blog::where('premium', 1)->orderBy('created_at', 'desc')->get();
        
        $categories = Category::all();

        if(!$user) {
            return redirect()->route('error.401');
        } else if ($user->premium === 0) {
            return redirect()->route('error.403');
        }

        return view('blogs.premium', compact('blogs', 'categories', 'user'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        // TODO :: toevoegen validatie && Mass-assignment
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $blog = Blog::create($validated);
        
        if($request->image) {
            $file = $validated['image']('image');
            $filename = $file->hashName();
            $file->storeAs('public', $filename, 'public');

            $blog->image = $filename;
        }
        
        $blog->save();
        
        if ($request->has('category_id')) {
            $blog->category()->attach($validated['category_id']);
        }
        
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog->load('category');
        $comments = app(CommentController::class)->show($blog->id);
        return view('blogs.blog', compact('blog', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // TODO :: toevoegen validatie && Mass-assignment
        $blog->title = $request->input('title');
        $blog->body = $request->input('body');
        $blog->premium = $request->input('premium');
        $blog->category()->sync($request->input('category_id'));
        
        if($request->image) {
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->storeAs('public', $filename, 'public');

            $blog->image = $filename;
        }
        
        $blog->save();

        return redirect()->route('blogs.blog', $blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();   
        return redirect()->route('users.dashboard');
    }
}
