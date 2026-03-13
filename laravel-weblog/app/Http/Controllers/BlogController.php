<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        $user = Auth::user();

        $user ? ($user->premium === 1 ? $haspremium = true : $haspremium = false) : $haspremium = false;
        
        return view('blogs.index', compact('blogs', 'haspremium', 'categories'));
    }
    
    
    public function premium()
    {

        $blogs = Blog::where('premium', 1)->orderBy('created_at', 'desc')->get();
        $user = Auth::user();
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
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->user_id =  Auth::id();
        $blog->title = $request->input('title');
        $blog->body = $request->input('body');
        $blog->premium = $request->input('premium');

        if($request->image) {
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->storeAs('public', $filename, 'public');

            $blog->image = $filename;
        }
        
        $blog->save();

        if ($request->has('category_id')) {
            $blog->category()->attach($request->input('category_id'));
        }

        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $blog = Blog::find($id);
        $blog->load('category');
        $comments = app(CommentController::class)->show($id);
        return view('blogs.blog', compact('blog', 'comments',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        $categories = Category::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->body = $request->input('body');
        $blog->premium = $request->input('premium');
        $blog->category()->sync($request->input('category_id'));

        //dd($request->file('image'));
        
        if($request->image) {
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->storeAs('public', $filename, 'public');

            $blog->image = $filename;
        }
        
        $blog->save();

        return redirect()->route('blogs.blog', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        
        return redirect()->route('users.dashboard');
    }
}
