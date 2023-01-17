<?php

namespace App\Models;
use CodeIgniter\Model;

class InstrumentoModel extends Model{

    protected $table = 'instrumentos';
    protected $primaryKey = "id";
    protected $allowedFields = ['instrumento','modelo','no_serie','correo','telefono','id_tipo'];
    protected $returnType = \App\Entities\Instrumento::class;
    protected $useTimestamps = false;
}

?>