<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReservationTable;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Table;
use App\Models\ReservationSpecs;
use App\Models\Available_date;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new ReservationSpecsSeeder)->run();
        $reservation = ReservationSpecs::latest()->first();

        $date_id = Available_date::select('id')->where('restaurant_id', $reservation->restaurant_id)->where('isFull?', false)->inRandomOrder()->first()->id;

        // // ¡¡¡PUEDE NO FUNCIONAR!!!
        // // ¿POR QUE? PORQUE ASIGNA, POR EJEMPLO, EL RESTAURANTE 1 PERO COMO NO HAY CAPACIDAD DE 10 PERSONAS (porque a la hora de hacer el TablesSeeder no pone ninguna de como mínimo 10), $table_selected === null Y PETA EL MIGRATE!
        $table_selected = Table::where('restaurant_id', $reservation->restaurant_id)->where('capacity', '>=', $reservation->quantity_people)->inRandomOrder()->first()->id;
        
        if(ReservationTable::where('date_id', $date_id)->where('table_id', $table_selected)->exists()){
            echo "¡Error! Ya existe un registro con date_id: $date_id y table_id: $table_selected";
        }

        ReservationTable::create([
                'reservation_table_specs' => $reservation->id,
                'table_id' => $table_selected,
                'date_id' => $date_id,
        ]);
    }
}
