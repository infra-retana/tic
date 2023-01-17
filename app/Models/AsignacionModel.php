<?php

namespace App\Models;
use CodeIgniter\Model;

class AsignacionModel extends Model{

    protected $table = 'asignaciones';
    protected $primaryKey = "id";
    protected $allowedFields = ['id_empleado','id_instrumento','id_modalidad','id_estado_entrega','id_estado_devolucion','fecha_asignacion','fecha_devolucion','comentario_entrega','comentario_devolucion'];
    protected $returnType = \App\Entities\Asignacion::class;
    protected $useTimestamps = false;

}

?>