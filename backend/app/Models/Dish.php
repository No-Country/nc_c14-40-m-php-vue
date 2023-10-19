<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $table = 'dishes';

    protected $fillable = [
        'restaurant_id',
        'id_category',
        'name',
        'price',
        'description',
    ];

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
