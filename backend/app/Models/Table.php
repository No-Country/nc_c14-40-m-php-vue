<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $table = 'tables';

    protected $fillable = [
        // 'restaurant_id',
        'capacity',
    ];

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

    public function reservation_tables()
    {
        return $this->belongsToMany('App\Models\ReservationTable');
    }
}
