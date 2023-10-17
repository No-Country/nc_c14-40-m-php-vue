<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id_category';
    protected $allowedFields = ['name'];

    protected $useTimestamps = false;
}
