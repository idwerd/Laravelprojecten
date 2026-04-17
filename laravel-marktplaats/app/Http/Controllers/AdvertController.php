<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterAdvertRequest;
use App\Http\Requests\StoreAdvertRequest;
use App\Http\Requests\UpdateAdvertRequest;
use App\Http\Requests\SearchAdvertRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Advert;
use App\Models\Bid;
use App\Models\Category;
use App\Helpers\AdvertHelper;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $adverts = Advert::all(); 
        $sortedAdverts = AdvertHelper::sortAdverts($adverts);
        $paginatedAdverts = AdvertHelper::paginateAdverts($sortedAdverts, 5);
        
        $categories = Category::all();

        return view('adverts.index', compact('paginatedAdverts', 'categories'));
    }

    
    public function filter(FilterAdvertRequest $request) 
    {
        $validated = $request->validated();
        $category_id = $validated['category_id'];

        $all_adverts = Advert::all();

        $category_id === '0' ? $adverts = $all_adverts : $adverts = $all_adverts->where('category_id', $category_id);
        $categories = Category::all();

        $sortedAdverts = AdvertHelper::sortAdverts($adverts);
        $paginatedAdverts = AdvertHelper::paginateAdverts($sortedAdverts, 5);

        return view('adverts.index', compact('paginatedAdverts', 'categories', 'category_id'));
    }

    public function search(SearchAdvertRequest $request)
    {
        $validated = $request->validated();
        $prompt = $validated['search'];

        $adverts = Advert::whereAny(['title', 'description'], 'LIKE', '%' . $prompt . '%')->orderBy('promote', 'desc')->get();
        $categories = Category::all();

        $sortedAdverts = AdvertHelper::sortAdverts($adverts);
        $paginatedAdverts = AdvertHelper::paginateAdverts($sortedAdverts, 5);
        
        return view('adverts.index', compact('paginatedAdverts', 'categories'));
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

    public function promote(Advert $advert) 
    {
        $advert->promote = 1;
        $advert->save();
        return redirect()->route('adverts.index');
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
