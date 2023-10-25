<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\TableService;

class ReservationsController extends Controller
{
    public function showRestaurantTables($restaurant_id){
        $tableServiceMethods = new TableService;
        return $tableServiceMethods->showOcupacityOfTableStats($restaurant_id);
    }
}
