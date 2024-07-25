<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewCreateRequest;
use App\Models\Review;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function show($shop_id)
    {
        $review_limit = 10;
        $reviews = Review::where("shop_id","=",$shop_id)->latest()->paginate($review_limit);
        $shop = Shop::find($shop_id);

        return view("review-list",compact("shop","reviews"));
    }

    public function create()
    {
        $shops = Shop::all();

        return view("review-create",compact("shops"));
    }

    public function store(ReviewCreateRequest $request)
    {
        $request->session()->regenerateToken();

        $user_id = Auth::id();
        $shop_id = $request->input("shop_id");
        $comment = $request->input("comment");
        $rating = $request->input("rating");

        Review::createReview($user_id, $shop_id, $comment, $rating);

        return redirect(route("reviews.create"));
    }
}
