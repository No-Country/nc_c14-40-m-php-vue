<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationTable;
use App\Models\ReservationSpecs;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function viewAllUserReservations($user_id){
        return ReservationTable::where('user_id', $user_id)->get();
    }

    public function createReservation(Request $request){

        $num_of_people = $request->people;
        $restaurant_selected = $request->restaurant;
        $reservation_date = $request->date;

        ReservationSpecs::create([
            'reservation_date' => $reservation_date,
            'quantity_people' => $num_of_people,
            'state_reservation' => "PE",
            'price' => 2,
        ]);
        $lastIdCreated = ReservationSpecs::latest()->first()->id;

        ReservationTable::create([
            'reservation_table_specs' => $lastIdCreated,
            'user_id' => Auth::id(),
            'restaurant_id' => $restaurant_selected,
            'table_id' => $table_selected,
        ]);


    }
}
