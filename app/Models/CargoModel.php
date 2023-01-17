<?php

namespace App\Models;
use CodeIgniter\Model;

class CargoModel extends Model{

    protected $table = 'cargos';
    protected $primaryKey = "id";
    protected $allowedFields = ['id','cargo'];
    protected $returnType = \App\Entities\Cargo::class;
    protected $useTimestamps = false;

}

?>