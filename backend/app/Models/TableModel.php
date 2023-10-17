<?php

namespace App\Models;

use CodeIgniter\Model;

class TableModel extends Model
{
    protected $table = 'tables';
    protected $primaryKey = ['table_id', 'restaurant_id'];

    protected $allowedFields = ['restaurant_id', 'capacity', 'occupied'];
    protected $useTimestamps = false;
}
