<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'photo', 'street', 'borough', 'cuisine', 'tables_number', 'telephone','opening_hour','closing_hour','country', 'user_id'];


    //One To Many Inverse Relationship
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function reservation(){
        return $this->hasMany('App\Models\Reservation');
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
    public function available_date()
    {
        return $this->hasMany('App\Models\Available_date');
    }
}
