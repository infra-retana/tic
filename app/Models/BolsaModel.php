<?php

namespace App\Models;
use CodeIgniter\Model;

class BolsaModel extends Model{

    protected $table = 'bolsa';
    protected $primaryKey = "id";
    protected $allowedFields = ['id','codigo'];
    protected $returnType = \App\Entities\Bolsa::class;
    protected $useTimestamps = false;

}

?>