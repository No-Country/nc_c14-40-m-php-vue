<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Table;
use App\Models\ReservationTable;
use App\Models\AvailableDate;

class TableService{

    # FUNCIONES NECESARIAS DE MESAS DE RESTAURANT

    // · VER MESAS DE UN RESTAURANTE -> showRestaurantTables()
    // · FUNCION BOOLEAN SI EL RESTAURANTE TIENE MESA CON CAPACIDAD SUFICIENTE PARA UNA RESERVA -> checkRestaurantTableCapacity()

    // FUNCIONES DE 1 MESA DE COMER:
    // · OCUPACIÓN SEMANAL o DIARIA DE LAS TABLAS DE UN RESTAURANTE -> showOcupacityOfTable()
    // · STATS DE LA OCUPACIÓN SEMANAL o DIARIA DE LAS TABLAS DE UN RESTAURANTE -> showOcupacityOfTableStats()

    // FUNCTIONES DE TODAS LAS MESAS DE COMER:

    // muestrame la ocupacion del turno X en el dia seleccionado (en porcentaje) -> howManyTablesAreOcuppiedInOneTurn()


    public function showRestaurantTables($restaurant_id){
        return Table::where('restaurant_id', $restaurant_id)->get();
    }

    public function checkRestaurantTableCapacity($restaurant_id, $num_persons) {
        
        $tables_of_restaurant = $this->showRestaurantTables($restaurant_id);
        $enough_capacity = false;

        // NO ESTOY COMPROBANDO TODAVÍA SI LA MESA ESTA YA ESTÁ SELECCIONADA!!!!
        
        foreach($tables_of_restaurant as $table){
            if($table->capacity >= $num_persons){
                $enough_capacity = true;
            }
        }
        return $enough_capacity;
    }

    public function showOcupacityOfTable($table_id, $day="week"){

        $restaurant_id = Table::where('id', $table_id)->value('restaurant_id'); // devuelve el restaurant_id
        $all_turns = AvailableDate::where('restaurant_id', $restaurant_id)->get(); // devuelve todos los turnos

        $check_table_ocupacity = ReservationTable::where('table_id', $table_id)->get(); // devuelve solo los turnos ocupados
        $dateIds = [];
        foreach ($check_table_ocupacity as $date) {
            $dateIds[] = $date->date_id;
        }

        $array = [];
        $dayData  = null;

        foreach ($all_turns as $turn) {
            if ($dayData === null || $turn->day != $dayData['day']) {
                if ($dayData !== null) {
                    $array[] = $dayData;
                }
                $dayData = [
                    'day' => $turn->day,
                    'hours' => []
                ];
            }
        
            $hourData = [
                'hour_start' => $turn->hour_start,
                'hour_end' => $turn->hour_end,
                'ocupado' => in_array($turn->id, $dateIds) ? true : false
            ];
        
            $dayData['hours'][] = $hourData;
        }
        
        if ($dayData !== null) {
            $array[] = $dayData;

            $array[] = [
                'table_specs' => [
                    'restaurant_id' => $restaurant_id,
                    'capacity_table' => Table::where('id', $table_id)->value('capacity')
                ]
            ];
        }

        if ($day !== 'week') {
            $array = array_filter($array, function ($item) use ($day) {
                return isset($item["day"]) && $item["day"] === $day;
            });
            $array = array_values($array);
        }
        return $array;
    }

    public function showOcupacityOfTableStats($table_id){

        $restaurant_id = Table::where('id', $table_id)->value('restaurant_id'); // devuelve el restaurant_id
        $days_of_week = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $array = [];
        
        for($i = 0 ; $i < count($days_of_week) ; $i++) {
            $count_ocupado = 0;

            $list_of_turns_by_day = $this->showOcupacityOfTable($table_id, $days_of_week[$i]);
            $day_turns = AvailableDate::where('day', $days_of_week[$i])->where('restaurant_id', $restaurant_id)->count();
            
            for($j = 0 ; $j < $day_turns ; $j++){
                if($list_of_turns_by_day[0]['hours'][$j]['ocupado']){
                    $count_ocupado++;
                }
            }

            $array[$days_of_week[$i]] = strval($count_ocupado).' / '.strval($day_turns);     
        }
        return $array;
    }
    
    public function checkRestaurantReservationDate($restaurant_id){
    
        

    }

}

?>