<?php

namespace App\Models;
use CodeIgniter\Model;

class EmpleadoModel extends Model{

    protected $table = 'empleados';
    protected $primaryKey = "id";
    protected $allowedFields = ['codigo','nombre','id_area','id_cargo','numero_fijo','numero_extension','id_localidad'];
    protected $returnType = \App\Entities\Empleado::class;
    protected $useTimestamps = false;

}

?>