<?php

namespace App\Models;
use CodeIgniter\Model;

class ItemBolsaModel extends Model{

    protected $table = 'item_bolsa';
    protected $primaryKey = "id";
    protected $allowedFields = ['id','id_bolsa','id_componente','nivel'];
    protected $returnType = \App\Entities\ItemBolsa::class;
    protected $useTimestamps = false;

}

?>