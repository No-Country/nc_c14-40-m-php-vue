<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class ReviewController extends Controller
{

    public function allRestaurantsAllReviews(){
        return Review::orderBy('id', 'desc')->get();
    }

    public function restaurantAllReviews($restaurant_id){

        if(!Restaurant::find($restaurant_id)){
            return response(['error' => "Restaurant not found!"], 404); 
        }
        return Review::where('restaurant_id', $restaurant_id)->orderBy('id', 'desc')->get();
    }

    public function restaurantAllReviewsRating($restaurant_id){
        
        if(!Restaurant::find($restaurant_id)){
            return response(['error' => "Restaurant not found!"], 404); 
        }

        $restaurant_reviews_addition = Review::where('restaurant_id', $restaurant_id)->sum('score');
        $restaurant_reviews_count = count($this->restaurantAllReviews($restaurant_id));
        return ($restaurant_reviews_addition / $restaurant_reviews_count);
    }

    public function createReview($restaurant_id , Request $request){
        
        if(!Restaurant::find($restaurant_id)){
            return response(['error' => "Restaurant not found!"], 404); 
        }

        $validator = Validator::make($request->all(), [
            'comment' => 'required | min:10',
            'score' => 'required | in:1,2,3,4,5',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors()], 401); 
        }

        $review = Review::create([
            'comment' => $request->comment,
            'score' => $request->score,
            'user_id' => Auth::id(),
            'restaurant_id' => intval($restaurant_id)
        ]);
        return response(['message' => 'Review created!', 'review' => $review], 200);
    }



}
