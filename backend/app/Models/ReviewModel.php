<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'review';
    protected $primaryKey = ['review_id', 'user_id', 'restaurant_id'];
    protected $allowedFields = ['comment', 'score', 'review_date'];

    protected $useTimestamps = false; 
}
