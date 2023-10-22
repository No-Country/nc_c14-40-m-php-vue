<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AvailableDate;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;

class AvailableDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            
            $restaurant_opening_original = $restaurant->opening_hour; // Por ejemplo, '07:00:00'
            $restaurant_closing_original = $restaurant->closing_hour; // Por ejemplo, '01:00:00'

            $hours_working_query = DB::select("SELECT TIMEDIFF(closing_hour, opening_hour) AS hours_working FROM restaurants WHERE id = :restaurantId", ['restaurantId' => $restaurant->id]);
            $hours_working = $hours_working_query[0]->hours_working;
            list($hours) = explode(':', $hours_working);
            $total_hours = (int)$hours;

            if($total_hours < 0){
                
                if($restaurant_opening_original === '00:00:00'){ // EJEMPLO: 00:00 a 06:00
                    $total_hours =  (int)strtotime($restaurant_closing_original);
                }
                else if($restaurant_closing_original === '00:00:00'){ // EJEMPLO: 20:00 a 00:00
                    $opening_seconds = strtotime($restaurant_opening_original);
                    $midnight_seconds = strtotime('24:00:00');
                    $time_diff = $midnight_seconds - $opening_seconds;
                    $total_hours = $time_diff / 3600;
                }else{
                    $total_hours = 24 + $total_hours; // EJEMPLO: 22:00 a 5:00 --> 24 + (5 - 22) = 7
                }
            }

            for($i = 0; $i < 7 ; $i++){

                $restaurant_opening = $restaurant_opening_original;

                for($j = 0; $j < $total_hours ; $j++){
                    
                    $working_days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                        
                    AvailableDate::create([
                        'restaurant_id' => $restaurant->id,
                        'day' => $working_days[$i],
                        'hour_start' => $restaurant_opening,
                        'hour_end' => date('H:i:s', strtotime($restaurant_opening . '+1 hour')),
                        'isFull?' => 0,
                    ]);

                    $restaurant_opening = date('H:i:s', strtotime($restaurant_opening . '+1 hour'));
                }
            }
        }
        // LÓGICA DE COMPROBAR SI UN TURNO 'isFull' EN MESAS NO IMPLEMENTADO!!
    }
}


