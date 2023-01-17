<?php

namespace App\Models;
use CodeIgniter\Model;

class ImpresoraModel extends Model{

    protected $table = 'impresoras';
    protected $primaryKey = "id";
    protected $allowedFields = ['modelo','no_serie','ip','operando','id_localidad','id_marca'];
    protected $returnType = \App\Entities\Impresora::class;
    protected $useTimestamps = false;
}

?>