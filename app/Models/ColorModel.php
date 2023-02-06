<?php

namespace App\Models;
use CodeIgniter\Model;

class ColorModel extends Model{

    protected $table = 'colores';
    protected $primaryKey = "id";
    protected $allowedFields = ['id','color'];
    protected $returnType = \App\Entities\Color::class;
    protected $useTimestamps = false;

}

?>