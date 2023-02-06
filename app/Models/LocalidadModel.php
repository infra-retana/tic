<?php

namespace App\Models;
use CodeIgniter\Model;

class LocalidadModel extends Model{

    protected $table = 'localidades';
    protected $primaryKey = "id";
    protected $allowedFields = ['id','localidad'];
    protected $returnType = \App\Entities\Asignacion::class;
    protected $useTimestamps = false;

}

?>