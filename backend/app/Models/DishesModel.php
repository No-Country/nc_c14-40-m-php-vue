<?php

namespace App\Models;

use CodeIgniter\Model;

class DishesModel extends Model
{
    protected $table = 'dishes';
    protected $primaryKey = 'id_dish';
    protected $allowedFields = ['restaurant_id', 'id_category', 'name', 'price', 'descripcion'];

    protected $useTimestamps = false;
}
