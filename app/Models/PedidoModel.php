<?php

namespace App\Models;
use CodeIgniter\Model;

class PedidoModel extends Model{

    protected $table = 'pedidos';
    protected $primaryKey = "id";
    protected $allowedFields = ['id','codigo','codigo_entrega','fecha_solicitud','fecha_entrega'];
    protected $returnType = \App\Entities\Marca::class;
    protected $useTimestamps = false;

}

?>