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
        return response(['count_reviews' => Review::count(), 'all_reviews_desc' => Review::orderBy('id', 'desc')->get()], 200);
    }

    public function restaurantAllReviews($restaurant_id){
        if(!Restaurant::find($restaurant_id)){
            return response(['error' => "Restaurant not found!"], 404); 
        }
        return response(['count_restaurant_reviews'=> Review::where('restaurant_id', $restaurant_id)->count(), 
                         'restaurant_all_reviews_desc' => Review::where('restaurant_id', $restaurant_id)->orderBy('id', 'desc')->get()
                        ], 200);
    }

    public function restaurantAllReviewsRating($restaurant_id){
        $restaurant = Restaurant::find($restaurant_id);

        if(!$restaurant){
            return response(['error' => "Restaurant not found!"], 404); 
        }

        $restaurant_reviews_addition = Review::where('restaurant_id', $restaurant_id)->sum('score');
        $restaurant_reviews_count = Review::where('restaurant_id', $restaurant_id)->count();
        return response(['restaurant_average_reviews' => ($restaurant_reviews_addition / $restaurant_reviews_count), 'restaurant' => $restaurant], 200);
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
