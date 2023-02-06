<?php

namespace App\Models;
use CodeIgniter\Model;

class TiposComponenteModel extends Model{

    protected $table = 'tipos_componente';
    protected $primaryKey = "id";
    protected $allowedFields = ['id','tipo'];
    protected $returnType = \App\Entities\TiposComponente::class;
    protected $useTimestamps = false;

}

?>