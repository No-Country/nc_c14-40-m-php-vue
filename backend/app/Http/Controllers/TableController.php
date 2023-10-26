<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Validator;
use App\Models\Table;

class TableController extends Controller
{
    public function insertTablesCapacity(Request $request, $restaurant_id){

    if(!Restaurant::find($restaurant_id)){
        return response(['message' => 'Restaurante no encontrado!'], 404);
    }
    if(Auth::user()->id !== Restaurant::find($restaurant_id)->value('user_id')){
        return response(['message' => 'Este restaurante no es tuyo!'], 403);
    }

    $number_of_tables_of_restaurant = Restaurant::where('user_id', Auth::user()->id)->value('tables_number');

    $rules = [];

    for ($i = 1; $i <= $number_of_tables_of_restaurant; $i++) {
        $rules["table_capacity_$i"] = 'required|integer';
    }

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return response(['error' => $validator->errors()], 400);
    }

    for($i = 1; $i <= $number_of_tables_of_restaurant; $i++){
        Table::create([
            'capacity' => $request["table_capacity_$i"],
            'restaurant_id' => $restaurant_id
        ]);
    }   

    return response(['message' => 'Tables created successfully'], 200);
    }

    public function editCapacityOfTables(Request $request, $restaurant_id){
        $number_of_tables_of_restaurant = Table::where('restaurant_id', $restaurant_id)->count(); // ARREGLAR!!!

        if($number_of_tables_of_restaurant === 0){
            return response(['error' => "El restaurnate no tiene ninguna mesa creada!"], 404);
        }

        $rules = [];

        for ($i = 1; $i <= $number_of_tables_of_restaurant; $i++) {
            $rules["table_capacity_$i"] = 'required|integer';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response(['error' => $validator->errors()], 400);
        }

        for($i = 1; $i <= $number_of_tables_of_restaurant; $i++){
            Table::where(['id' => $i, 'restaurant_id' => $restaurant_id])->update([ 'capacity' => $request["table_capacity_$i"]]);
        }   

        return response(['message' => 'Tables updated successfully'], 200);
    }
}
