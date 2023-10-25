<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationTable;
use App\Models\ReservationSpecs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\TableService;
use App\Models\Restaurant;

class ReservationController extends Controller
{
    public function viewAllUserReservations($user_id){
        return ReservationTable::where('user_id', $user_id)->get();
    }

    public function createReservation(Request $request, $restaurant_id){

        $tableServiceMethods = new TableService;

        $num_of_people = $request->people;
        $reservation_date = $request->date;
        $turn_selected = $request->turn_selected;

        $search_restaurant = Restaurant::find($restaurant_id);

        if($search_restaurant){

            if($tableServiceMethods->checkRestaurantTableCapacity($restaurant_id, $num_of_people)){

                

                $validator = Validator::make($request->all(),[
                    'num_of_people' => 'integer | required',
                    'reservation_date' => 'string | required',
                    'turn_selected' => 'required|date_format:H:i',
                ]);


            }else{
                return response(['error' => "El restaurante no dispone de una mesa tan grande para el número de personas insertado"], 404);
            }
        }else{
            return response(['error' => "Restaurante no encontrado!"], 404); // checkear si el restaurant_id existe?
        }


        // checker si el restaurant tiene ese turno en sus horas disponibles
        // checkear si esta full el turno
        // checkear que la capacidad de num_of_people es correcta para el tamaño de mesa


        ReservationSpecs::create([
            'reservation_date' => $reservation_date,
            'quantity_people' => $num_of_people,
            'state_reservation' => "PE",
            'price' => 2,
        ]);
        $lastIdCreated = ReservationSpecs::latest()->first()->id;

        // ReservationTable::create([
        //     'reservation_table_specs' => $lastIdCreated,
        //     'user_id' => Auth::id(),
        //     'restaurant_id' => $restaurant_selected,
        //     'table_id' => $table_selected,
        // ]);


    }
}
