<?php

namespace App\Models;

use CodeIgniter\Model;

class PayModel extends Model
{
    protected $table = 'pay';
    protected $primaryKey = 'id_pay';
    protected $allowedFields = ['reservation_id', 'restaurant_id', 'user_id', 'total', 'pay_date'];

    protected $useTimestamps = false;
}
