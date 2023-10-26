<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationTable;
use App\Models\ReservationSpecs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\TableService;
use App\Models\Restaurant;
use App\Models\Table;
use App\Models\AvailableDate;

class ReservationController extends Controller
{
    public function viewAllUserReservations($user_id){
        return ReservationTable::where('user_id', $user_id)->get();
    }

    public function createReservation(Request $request, $restaurant_id){

        $tableServiceMethods = new TableService;

        $people = intval($request->people);
        $day = $request->day;
        $turn_selected = $request->turn_selected;

        $search_restaurant = Restaurant::find($restaurant_id);

        if($search_restaurant){

            if($tableServiceMethods->checkRestaurantTableCapacity($restaurant_id, $people)){

                $validator = Validator::make($request->all(),[
                    'people' => 'integer|required',
                    'turn_selected' => 'required|date_format:H:i',
                    'day' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
                ]);

                if($validator->fails()){
                    return response(['error' => $validator->errors()], 401); 
                }

                $hourStartTimeArray = AvailableDate::where('restaurant_id', $restaurant_id)->pluck('hour_start')->all();
                $hourStartIntArray = array_map(function ($time) {
                    return (int)date('H', strtotime($time));
                }, $hourStartTimeArray);
                $uniqueArray = array_unique($hourStartIntArray);

                if(in_array(intval($turn_selected), $uniqueArray)){

                    if(!AvailableDate::where('restaurant_id', $restaurant_id)->where('day', $day)->where('hour_start', $turn_selected)->value('isFull?')){

                        $tableServiceMethods->checkRestaurantTableCapacity($restaurant_id, $people);

                        ReservationSpecs::create([
                            'quantity_people' => $people,
                            'state_reservation' => 'PE',
                            'price' => 2,
                            'user_id' => Auth::user()->id,
                            'restaurant_id' => $restaurant_id
                        ]);
                        $lastIdCreatedReservationSpecs = ReservationSpecs::latest()->first()->id;

                        $date_id = AvailableDate::where('restaurant_id', $restaurant_id)->where('day', $day)->where('hour_start', $turn_selected)->first()->id;
                        
                        $num_tablas_del_restaurante = Table::where('restaurant_id', $restaurant_id)->count();
                        $tables_ids_array = Table::where('restaurant_id', $restaurant_id)->pluck('id')->toArray();
                        $array_tables = Table::where('restaurant_id', $restaurant_id)->get();

                        $associative_array_ids_table_with_capacity = [];
                        foreach ($array_tables as $table) {
                            $associative_array_ids_table_with_capacity[] = [$table->id => $table->capacity];
                        }
                        
                        for($i = 0; $i < $num_tablas_del_restaurante ; $i++){
                            if(ReservationTable::where('table_id', $tables_ids_array[$i])->where('date_id', $date_id)->exists()){
                                $associative_array_ids_table_with_capacity[$i]['state'] = 'ocupada';
                            }else{
                                $associative_array_ids_table_with_capacity[$i]['state'] = 'libre';
                            }
                        }

                        $todoOcupado = true;
                        foreach ($associative_array_ids_table_with_capacity as $dato) {
                            if ($dato['state'] === 'libre') {
                                $todoOcupado = false;
                                break;
                            }
                        }

                        if(!$todoOcupado){
                            
                            $claveMenorValor = null;
                            $valorMenor = PHP_INT_MAX;

                            foreach ($associative_array_ids_table_with_capacity as $dato) {
                                if ($dato['state'] === 'libre') {
                                    $valorDato = $dato[array_key_first($dato)];
                                    if ($valorDato >= $people && $valorDato < $valorMenor) {
                                        $claveMenorValor = array_key_first($dato);
                                        $valorMenor = $valorDato;
                                    }else{
                                    }
                                }
                            }
                            if($claveMenorValor === null){
                                return response(['error' => "Lo siento, pero para esta cantidad de personas no hay mesas disponibles para este turno el dia de hoy!"], 401);
                            }

                            ReservationTable::create([
                                'reservation_table_specs' => $lastIdCreatedReservationSpecs,
                                'table_id' => $claveMenorValor,
                                "date_id" => $date_id,
                            ]);

                            // AQUÍ TENDRIA QUE VOLVER A LLAMAR A LA FUNCION DE SABER SI ESTA TODO OCUPADO!!
                            $reserva = AvailableDate::where('id', $date_id)->first();
                            
                            return response(['message' => "Reservation did it!", "restaurant" => Restaurant::find($restaurant_id), "day" => $day, "turn" => $reserva->hour_start, "table" => $claveMenorValor], 200);
                        }else{
                            AvailableDate::where('restaurant_id', $restaurant_id)->where('day', $day)->where('hour_start', $turn_selected)->update(['isFull?' => true]);
                            return response(['error' => "Lo siento mucho, pero está todo ocupado!"], 401);
                        }
                    } else{
                        return response(['error' => "El restaurante esta lleno para esa día y hora!!"], 401);
                    }
                }else{
                    return response(['error' => "El restaurante no tiene este horario disponible, su horario de reservas es de {$uniqueArray[0]}:00 a {$uniqueArray[count($uniqueArray) - 1]}:00"], 401);
                }
            }else{
                return response(['error' => "El restaurante no dispone de una mesa tan grande para el número de personas insertado"], 404);
            }
        }else{
            return response(['error' => "Restaurante no encontrado!"], 404);
        }
    }

    public function showRestaurantReservations($restaurant_id) {
        $restaurant = Restaurant::find($restaurant_id);
        if (!$restaurant) {
            return response(['error' => "Restaurante no encontrado!"], 404);
        }
    
        $reservations = ReservationSpecs::where('restaurant_id', $restaurant_id)->get();
        if ($reservations->isEmpty()) {
            return response(['message' => "No hay reservas disponibles para este restaurante."], 200);
        }
    
        $reservationData = [];
        foreach ($reservations as $reservation) {
            $reservationTable = ReservationTable::where('reservation_table_specs', $reservation->id)->first();

            if ($reservationTable) {
                $availableDate = AvailableDate::find($reservationTable->date_id);
    
                $reservationData[] = [
                    'reservation_id' => $reservation->id,
                    'quantity_people' => $reservation->quantity_people,
                    'state_reservation' => $reservation->state_reservation,
                    'price' => $reservation->price,
                    'user_id' => $reservation->user_id,
                    'date' => $availableDate->day,
                    'hour_start' => $availableDate->hour_start,
                    'table' => $reservationTable->table_id,
                ];
            }
        }
    
        return response(['reservations' => $reservationData], 200);
    }
    
    

}
