<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationsModel extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'reservation_id';
    protected $allowedFields = [
        'user_id', 'restaurant_id', 'price', 'quantity_people', 'stateReservation', 'reservation_date'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
