<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReservationTable;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Table;
use App\Models\ReservationSpecs;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new ReservationSpecsSeeder)->run();
        $reservation = ReservationSpecs::latest()->first();

        // // ¡¡¡PUEDE NO FUNCIONAR!!!
        // // ¿POR QUE? PORQUE ASIGNA, POR EJEMPLO, EL RESTAURANTE 1 PERO COMO NO HAY CAPACIDAD DE 10 PERSONAS (porque a la hora de hacer el TablesSeeder no pone ninguna de como mínimo 10), $table_selected === null Y PETA EL MIGRATE!
        $table_selected = Table::where('restaurant_id', $reservation->restaurant_id)->where('capacity', '>=', $reservation->quantity_people)->where('is_Taken', '=', false)->inRandomOrder()->first()->id;
        Table::where('id', $table_selected)->update(['is_Taken' => true]); // table reservation
        
        ReservationTable::create([
                'reservation_table_specs' => $reservation->id,
                'table_id' => $table_selected,
        ]);
    }
}
