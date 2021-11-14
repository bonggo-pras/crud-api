<?php

namespace App\Models;

use CodeIgniter\Model;

class MakananModel extends Model
{
    protected $table = 'tbl_makanan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'jumlah', 'berat', 'harga'];
}
