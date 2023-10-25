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
}
