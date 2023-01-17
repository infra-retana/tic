<?php

namespace App\Models;
use CodeIgniter\Model;

class ComponenteModel extends Model{

    protected $table = 'componentes';
    protected $primaryKey = "id";
    protected $allowedFields = ['id_tipo_componente','id_color','id_impresora','modelo','nivel','actualizacion_nivel','fecha_instalacion'];
    protected $returnType = \App\Entities\Impresora::class;
    protected $useTimestamps = false;

}

?>