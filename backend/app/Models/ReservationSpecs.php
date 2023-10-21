<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationSpecs extends Model
{
    use HasFactory;

    protected $table = 'reservations_specs';

    protected $fillable = [
        'quantity_people',
        'date_id',
        'state_reservation',
        'price',
        'user_id',
        'restaurant_id',
        'date_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

    public function reservation_tables()
    {
        return $this->belongsToMany('App\Models\ReservationTable');
    }
}

