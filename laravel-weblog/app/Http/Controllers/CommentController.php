<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->body = $request->input('comment');
        $comment->save();
        /*
        $blog = Blog::find($id);
        return view('blogs.blog', compact('blog'));
        */
        return redirect()->route('blogs.blog');
        /*
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->body = $request->input('body');
        $blog->category_id = $request->input('category_id');
        $blog->save();

        return redirect()->route('blogs.index');
        */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comments = Comment::find($id);
        return view('blogs.blog', compact('blog'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
