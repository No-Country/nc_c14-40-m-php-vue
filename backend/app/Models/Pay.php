<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;
    protected $table = 'pays';

    protected $fillable = [
        'restaurant_id',
        'user_id',
        'reservation_id',
        'total',
        'pay_date',
    ];

    public function reservation()
    {
        return $this->belongsTo('App\Models\Reservation');
    }
}
