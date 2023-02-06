<?php

namespace App\Models;
use CodeIgniter\Model;

class MarcaModel extends Model{

    protected $table = 'marcas';
    protected $primaryKey = "id";
    protected $allowedFields = ['id','marca'];
    protected $returnType = \App\Entities\Marca::class;
    protected $useTimestamps = false;

}

?>