<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(StoreReviewRequest $request) {
        
        $review = Review::create($request->validated());
       
        $reviews = Review::all();

        return ReviewResource::collection($reviews);
    }
}
