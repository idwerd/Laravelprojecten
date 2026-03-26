<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterAdvertRequest;
use App\Http\Requests\StoreAdvertRequest;
use App\Http\Requests\UpdateAdvertRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Advert;
use App\Models\Bid;
use App\Models\Category;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $adverts = Advert::orderBy('created_at', 'desc')->get(); 
        $categories = Category::all();
        return view('adverts.index', compact('adverts', 'categories'));
    }

    
    public function filter(FilterAdvertRequest $request) 
    {
       // dd($request);
        $validated = $request->validated();
        $filter_category = $validated['filter-category'];

        $all_adverts = Advert::orderBy('created_at', 'desc')->get();

        $filter_category === '0' ? $adverts = $all_adverts : $adverts = $all_adverts->where('category_id', $filter_category);
        $categories = Category::all();

        return view('adverts.index', compact('adverts', 'categories', 'filter_category'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('adverts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdvertRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $validated['promote'] = 0;
        $advert = Advert::create($validated);

        if($request->image) {
            $file =$request->file('image');
            $filename = $file->hashName();
            $file->storeAs('public', $filename, 'public');

            $advert->image = $filename;
        }

        $advert->save();
        return redirect()->route('adverts.advert', compact('advert'));
    }

    /**
     * Display the specified resource.s
     */
    public function show(Advert $advert)
    {
        $bids = Bid::where('advert_id', $advert->id)->orderBy('price', 'desc')->get();
        return view('adverts.advert', compact('advert', 'bids'));
    }

    public function bid(Request $request, Advert $advert)
    {
        
        //TODO:: mass assignment and validation
        $bid = new Bid();
        $bid->price = $request->input('price');
        $bid->user_id = Auth::id();
        $bid->advert_id = $advert->id;

        $bid->save();
        //dd($request);

        return redirect()->route('adverts.advert', ['advert' => $advert]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advert $advert)
    {
        $categories = Category::all();
        return view('adverts.edit', compact('advert', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdvertRequest $request, Advert $advert)
    {
        $validated = $request->validated();
        $validated['promote'] = 0;
        $advert->fill($validated);

        if($request->image) {
            $file =$request->file('image');
            $filename = $file->hashName();
            $file->storeAs('public', $filename, 'public');

            $advert->image = $filename;
        }

        $advert->save();

        return redirect()->route('adverts.advert', compact('advert'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advert $advert)
    {   
        Bid::where('advert_id', $advert->id)->delete();
        $advert->delete();
        return redirect()->route('account.dashboard');
    }
}
