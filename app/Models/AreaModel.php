<?php

namespace App\Models;
use CodeIgniter\Model;

class AreaModel extends Model{

    protected $table = 'areas';
    protected $primaryKey = "id";
    protected $allowedFields = ['id','codigo','area'];
    protected $returnType = \App\Entities\Area::class;
    protected $useTimestamps = false;

}

?>