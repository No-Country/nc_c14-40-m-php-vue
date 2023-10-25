<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    public function getAllRestaurants(){
        return Restaurant::all();
    }

    public function showRestaurantsOfUser($id){
        if(Auth::user()->id === intval($id)){
            $restaurants = Restaurant::where('user_id', intval($id))->get();
            $count_restaurants = $restaurants->count();
            return response(['number_of_restaurants' => $count_restaurants, 'restaurants' => $restaurants], 200);
        }else{
            return response(['error' => "Access denied!"], 403);
        }
    }

    public function createRestaurant(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'photo' => 'string',
            'street' => 'required|string',
            'borough' => 'required|string',
            'cuisine' => 'required|string',
            'tables_number' => 'required|integer',
            'telephone' => 'required|string',
            'opening_hour' => 'required|date_format:H:i',
            'closing_hour' => 'required|date_format:H:i',
            'country'=> 'required|string',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors()], 401); 
        }
        
        $restaurant = Restaurant::create([
            'name' => $request->name,
            'photo' => $request->photo,
            'street' => $request->street,
            'borough' => $request->borough,
            'cuisine' => $request->cuisine,
            'tables_number' => $request->tables_number,
            'telephone' => $request->telephone,
            'opening_hour' => $request->opening_hour,
            'closing_hour' => $request->closing_hour,
            'country'=>$request->country,
            'user_id' => Auth::user()->id,
        ]);

        return response(['message' => 'Restaurant created! Now you need to indicate the capacity of your tables!', 'route_insert_tables' => '/api/restaurant/{restaurant_id}/tables', 'restaurant' => $restaurant], 200);
    }

    public function deleteRestaurant($idUser,$idRest){

        if(Auth::user()->id === intval($idUser) ){
            $restaurant = Restaurant::where('id', intval($idRest))->get();
            if(!$restaurant){
                return response(['error' => "The restaurant doesn't exist!"], 404);
            }
            else{
                $restaurant->delete();
                return response(['message' => "restaurant deleted successfully",'restaurant' => $restaurant], 200);
            }
        }else{
            return response(['error' => "You have access denied!"], 403);
        }
    }

    public function getRestaurant($idUser,$idRest){

        if(Auth::user()->id === intval($idUser) ){
            $restaurant = Restaurant::where('id', intval($idRest))->get();
            if(!$restaurant){
                return response(['error' => "The restaurant doesn't exist!"], 404);
            }
            else{
                return response(['message' => "restaurant gotten successfully",'restaurant' => $restaurant], 200);
            }
        }else{
            return response(['error' => "You have access denied!"], 403);
        }
    }

    public function updateRestaurant($idUser,$idRest, Request $request){
        if(Auth::user()->id === intval($idUser)){
            $restaurants = Restaurant::where('id', intval($idRest))->get();
            if(!$restaurants){
                return response(['error' => "The restaurant doesn't exist!"], 404);
            }
            else{
                $restaurants->update([
                    'name' => $request->name,
                    'photo' => $request->photo,
                    'street' => $request->street,
                    'borough' => $request->borough,
                    'cuisine' => $request->cuisine,
                    'tables_number' => $request->tables_number,
                    'telephone' => $request->telephone,
                    'opening_hour' => $request->opening_hour,
                    'closing_hour' => $request->closing_hour,
                    'country' => $request->country,
                ]);
                
                return response(['success' => "restaurant updated successfully"], 200);
            }
        }else{
            return response(['error' => "Access denied!"], 403);
        }
    }
    

}
