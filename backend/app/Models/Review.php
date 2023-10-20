<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';

    protected $fillable = [
        // 'user_id',
        // 'restaurant_id',
        'comment',
        'score',
        'review_date',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }
}
