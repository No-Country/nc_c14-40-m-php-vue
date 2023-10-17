<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationsTableModel extends Model
{
    protected $table = 'reservationsTable';
    protected $primaryKey = ['reservation_id', 'user_id', 'restaurant_id', 'table_id'];
    protected $allowedFields = ['user_id', 'restaurant_id', 'table_id'];

    protected $useTimestamps = false;
}
