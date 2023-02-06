<?php

namespace App\Controllers;

use App\Models\EmpleadoModel;
use App\Models\ImpresoraModel;
use App\Models\ItemBolsaModel;
use App\Models\AsignacionModel;
use App\Models\ComponenteModel;
use App\Models\InstrumentoModel;

class Delete extends BaseController
{

    public function bagitem(){
        
        if(isset($_POST["id"])){
            $id = $_POST["id"];
            $item = new ItemBolsaModel();
            $item->where("id_componente",$id)->delete();
            
        }
        return redirect()->back();
    }

}

?>