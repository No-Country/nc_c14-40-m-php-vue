<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReservationTable;
use App\Models\Table;
use App\Models\ReservationSpecs;
use App\Models\AvailableDate;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i = 0; $i < 1000 ; $i++) {
            (new ReservationSpecsSeeder)->run();
            $reservation = ReservationSpecs::latest()->first();
    
            $restaurant_have_turns = AvailableDate::where('restaurant_id', $reservation->restaurant_id)->exists();

            if($restaurant_have_turns){

                $date_id = AvailableDate::select('id')->where('restaurant_id', $reservation->restaurant_id)->where('isFull?', false)->inRandomOrder()->first()->id;

                $restaurant_have_tables_capacity = Table::select('id')->where('restaurant_id', $reservation->restaurant_id)->where('capacity', '>=', $reservation->quantity_people)->exists();

                if($restaurant_have_tables_capacity){
                    
                    $table_selected = Table::select('id')->where('restaurant_id', $reservation->restaurant_id)->where('capacity', '>=', $reservation->quantity_people)->inRandomOrder()->first()->id;
                    
                    if(!ReservationTable::where('date_id', $date_id)->where('table_id', $table_selected)->exists()){
                        ReservationTable::create([
                            'reservation_table_specs' => $reservation->id,
                            'table_id' => $table_selected,
                            'date_id' => $date_id,
                        ]);
                    }else{
                        // echo "¡Error! Ya existe un registro con date_id: $date_id y table_id: $table_selected".PHP_EOL; // 3a condicion: EJ: Existe ya una reserva de esa mesa con ese mismo turno
                    }
                }else{
                    // echo "No hay mesas en nuestro local para tanta gente!".PHP_EOL;; // 2a condición EJ: El usuario quiere reservar una mesa para 10 en un restaurante que su mesa más grande es de 8
                }
            }else{
                // echo "El restaurante que usted ha elegido, no tiene turnos que disponer por vacaciones".PHP_EOL; // 1a condición EJ: restaurant_id = 4 -> 17:00 a 17:00 === 0 turnos -> conclusión: tabla available_dates NO EXISTE restaurant_id = 4
            }
        }
    }
}
