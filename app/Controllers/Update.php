<?php

namespace App\Controllers;

use App\Models\BolsaModel;
use App\Models\PedidoModel;
use App\Models\EmpleadoModel;
use App\Models\ImpresoraModel;
use App\Models\ItemBolsaModel;
use App\Models\AsignacionModel;
use App\Models\ComponenteModel;
use App\Controllers\BaseController;

class Update extends BaseController
{
    
    public function niveles_componetes(){

        $db = db_connect();
        $niveles = "";
        $id_bolsa = null;

        $xpedido = isset($_POST['btn_bag']);
        $xdrop = isset($_POST['btn_delete']);

        if($xdrop){
            $modelItem = new ComponenteModel();
            $modelItem->where("id",$_POST['btn_delete'])->delete();
        }

        if($xpedido){
            //VER SI HAY BOLSA CREADA
            $query1 = "select * from bolsa";
            $result1 = $db->query($query1)->getNumRows();
            if($result1 == 0){
                //NO HAY BOLSA CREADA, SE CREA
                $query2 = "select max(id) as max from pedidos";
                $result2 = $db->query($query2)->getResult();
                $max = $result2[0]->max;
                $codigo = "PED" . substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),1,3) . "_" . ($max + 1);
                $bolsa = new BolsaModel();
                $bolsa->insert(['codigo' => $codigo]);
            }else{
                //HAY BOLSA SE OBTIENE EL ID DE BOLSA
                $result3 = $db->query($query1)->getResult();
                $id_bolsa = $result3[0]->id;
            }
        }


        if(isset($_POST['id_impresora'])){
            $id_impresora = $_POST['id_impresora'];
            
            $query = "select * from nivel_componentes where id_impresora = ?";
            $result = $db->query($query,[$id_impresora])->getResult();

            foreach($result as $component){
                $idc = $component->id;

                if(isset($_POST['check_' . $idc])){
                    $nivel = $_POST['nivel_' . $idc];

                    if($xpedido){

                        $itembolsa = new ItemBolsaModel();
                        $item = $itembolsa->where("id_componente", $idc)->first();
                        if(is_null($item)){
                            $builder = $db->table("item_bolsa");
                            $builder->set("id_bolsa",$id_bolsa);
                            $builder->set("id_componente",$idc);
                            $builder->set("nivel",$nivel);
                            $builder->insert();
                        }
                        
                    }else{
                        $builder = $db->table("componentes");
                        $builder->set("nivel",$nivel);
                        $builder->set("actualizacion_nivel",date("Y-m-d"));
                        $builder->where("id",$idc);
                        $builder->update();
                    }
                }
            }
        }

        return redirect()->back();
    }


    public function devolucion_instrumento(){
        $comentario_devolucion = $_POST['comentario'];
        $id_estado_devolucion = $_POST['estado'];
        $fecha_devolucion = $_POST['fecha'];
        $id_empleado = $_POST['id_empleado'];
        $id_asignacion = $_POST['id_asignacion'];

        
        $data['comentario_devolucion'] = $comentario_devolucion;
        $data['id_estado_devolucion'] = $id_estado_devolucion;
        $data['fecha_devolucion'] = $fecha_devolucion;

        $asignacion = new AsignacionModel();
        $asignacion->update($id_asignacion,$data);

        return redirect()->to('//assignments//' . $id_empleado);
    }


    public function edit_employee(){
        
        $id_empleado = $_POST['id'];
        $empleado['codigo'] = $_POST['codigo'];
        $empleado['nombre'] = $_POST['nombre'];
        $empleado['numero_fijo'] = $_POST['fijo'];
        $empleado['numero_extension'] = $_POST['extension'];
        $empleado['id_cargo'] = $_POST['cargo'];
        $empleado['id_area'] = $_POST['area'];
        $empleado['id_localidad'] = $_POST['localidad'];

        $model = new EmpleadoModel();
        $model->update($id_empleado,$empleado);

        return redirect()->to('//edit-employee//' . $id_empleado);

    }

    public function codigo_entrega(){
        if(isset($_POST['codigo'])){
            $pedido['codigo_entrega'] = $_POST['codigo'];
            $id = $_POST['id_pedido'];
            $model = new PedidoModel();
            
            $model->update($id,$pedido);
        }

        return redirect()->back();

    }

}
?>