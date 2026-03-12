<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Blog;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        $user = User::find(Auth::id());
        return view('users.dashboard', compact('blogs', 'user'));
    }

    public function premium() 
    {
        $user = User::find(Auth::id());
        $premium = $user->premium === 1 ? 0 : 1;
        $user->update(['premium' => $premium]);
        
        return redirect()->route('users.dashboard');
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*
        $blogs = Blog::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return $blogs;*/
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
