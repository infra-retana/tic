<?php

namespace App\Controllers;

use App\Models\AreaModel;
use App\Models\CargoModel;
use App\Models\ColorModel;
use App\Models\MarcaModel;
use App\Models\PedidoModel;
use App\Models\EmpleadoModel;
use App\Models\ImpresoraModel;
use App\Models\ItemBolsaModel;
use App\Models\LocalidadModel;
use App\Models\AsignacionModel;
use App\Models\ComponenteModel;
use App\Models\InstrumentoModel;
use App\Controllers\BaseController;
use App\Models\TiposComponenteModel;

class Home extends BaseController
{
    public function index()
    {
        return redirect()->to("//printers//");
    }

    public function printers()
    {
        $db = db_connect();

        if(!isset($_GET['search'])){
            $query = "select * from stock_impresoras order by marca";
            $result = $db->query($query)->getResult();
            $data['impresoras'] = $result;
        }else{
            $search = $_GET['search'];
            $query = "select * from stock_impresoras where no_serie = ? or localidad like ?";
            $result = $db->query($query,[$search, "%" . $search . "%"])->getResult();
            $data['impresoras'] = $result;
        }

        return view('printers',$data);
    }

    public function components($id){
        $db = db_connect();
        $query = "select * from nivel_componentes where id_impresora = ?";
        $result = $db->query($query,[$id])->getResult();
        $print = new ImpresoraModel();

        $data['componentes'] = $result;
        $data['impresora'] = $print->find($id);

        return view('printer-components',$data);
    }

    public function lowlevels(){
        $db = db_connect();
        $query = "select * from niveles_bajos";
        $result = $db->query($query)->getResult();
        $data['componentes'] = $result;

        return view('niveles-bajos',$data);
    }

    public function assignments(){
        $db = db_connect();
        
        if(!isset($_GET["search"])){
            $query = "select * from lista_empleados";
            $result = $db->query($query)->getResult();
            $data['empleados'] = $result;
        }else{
            $search = $_GET['search'];
            $query = "select * from lista_empleados where codigo = ? or nombre like ?";
            $result = $db->query($query,[$search, "%" . $search . "%"])->getResult();
            $data['empleados'] = $result;
        }

        return view('empleados',$data);
    }

    public function listassignments($id){
        $db = db_connect();
        $query1 = "select * from detalle_asignaciones where id_estado_devolucion = ? and id_empleado = ?";
        $query2 = "select * from detalle_asignaciones where id_estado_devolucion < ? and id_empleado = ?";
        $result1 = $db->query($query1,[7,$id])->getResult();
        $result2 = $db->query($query2,[7,$id])->getResult();
        $empleado = new EmpleadoModel();
        
        $data['asignaciones_activas'] = $result1;
        $data['asignaciones_historial'] = $result2;
        $data['empleado'] = $empleado->find($id);
        return view('assignments',$data);
    }

    public function newassignment($id){
        $db = db_connect();
        $empleado = new EmpleadoModel();

        if(isset($_POST["search"])){
            $error = null;
            $query1 = "select * from instrumentos where no_serie = ?";
            $result1 = $db->query($query1,[$_POST['search']])->getResult();
            $result = $result1 ? $result1[0] : null; 

            if($result1 == null){
                $error = "El instrumento no existe";
            }else{
                $query2 = "select * from asignaciones where id_instrumento = ? and id_estado_devolucion = ?";
                $result2 = $db->query($query2,[$result->id,7])->getNumRows();
                if($result2 >= 1){
                    $error = "El instrumento ya esta en uso";
                    $result = null;
                }
            }

            $data['error'] = $error;           
            $data['instrumento'] = $result;
        }
        
        $query1 = "select * from tipos_instrumento";
        $query2 = "select * from modalidades";
        $query3 = "select * from estados_instrumento where id <= 4";

        $result1 = $db->query($query1)->getResult();
        $result2 = $db->query($query2)->getResult();
        $result3 = $db->query($query3)->getResult();
        

        $data['empleado'] = $empleado->find($id);
        $data['tipos_instrumento'] = $result1;
        $data['modalidades'] = $result2;
        $data['estados_instrumento'] = $result3;
        
        return view('new-assignment',$data);
    }

    public function returns($id){
        $db = db_connect();
        $asignacion = new AsignacionModel();
        $instrumento = new InstrumentoModel();

        $data['asignacion'] = $asignacion->find($id);
        $data['instrumento'] = $instrumento->find($data['asignacion']->id_instrumento);

        $query1 = "select * from estados_instrumento where id in (2,3,4,5,6)";
        $result1 = $db->query($query1)->getResult();
        $data['estados'] = $result1;

        return view('returns',$data);
    }

    public function detailassignment($id){
        $db = db_connect();
        $query = "select * from detalle_asignaciones where id_asignacion = ?";
        $result = $db->query($query,[$id])->getResult();
        $data['asignacion'] = $result[0];
        
        return view('detail-assignment',$data);
    }

    public function newemployee(){
        $db = db_connect();
        $area = new AreaModel();
        $cargo = new CargoModel();
        $localidad = new LocalidadModel();
        
        $data['areas'] = $area->findAll();
        $data['cargos'] = $cargo->findAll();
        $data['localidades'] = $localidad->findAll();

        return view('new-employee',$data);
    }


    public function editemployee($id){
        $db = db_connect();
        $area = new AreaModel();
        $cargo = new CargoModel();
        $localidad = new LocalidadModel();
        $empleado = new EmpleadoModel();
        
        $data['areas'] = $area->findAll();
        $data['cargos'] = $cargo->findAll();
        $data['localidades'] = $localidad->findAll();
        $data['empleado'] = $empleado->find($id);

        return view('edit-employee',$data);
    }

    public function orders(){
        $db = db_connect();
        $result = null;

        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $query = "select * from items_pedido where codigo_entrega = ?";
            $result = $db->query($query,[$search])->getResult();
        }else{
            $query = "select * from items_pedido";
            $result = $db->query($query)->getResult();
        }

        $query1 = "select count(*) as items from item_bolsa";
        $result1 = $db->query($query1)->getResult();
        $data['pedidos'] = $result;
        $data['items'] = $result1[0]->items;
        return view('orders',$data);
    }

    public function bag(){
        $db = db_connect();

        //bolsa existe
        $query1 = "select * from bolsa limit 1";
        $result1 = $db->query($query1)->getResult();

        //correos
        $query2 = "select * from correos";
        $result2 = $db->query($query2)->getResult();
        $correos = "";
        foreach($result2 as $res){
            $correos .= $res->correo . ", ";
        }

        

        $itembolsa = new ItemBolsaModel();
        $items = $itembolsa->findAll();
        $n = sizeof($items);

        $bag = null;

        foreach($items as $it){
            $noserie = $it->serie_impresora;
            $query3 = "select * from detalle_componentes where id_componente = ?";
            $result3 = $db->query($query3,[$it->id_componente])->getResult()[0];
            
            $bag[$result3->serie_impresora][$it->id_componente] = [
                "id" => $result3->id_componente, 
                "nivel" => $result3->nivel_componente, 
                "tipo" => $result3->tipo_componente, 
                "modelo" => $result3->modelo_componente, 
                "color" => $result3->color_componente,
                "serie" => $noserie
            ];

        }

        $cuerpoCorreo = "";

        if(isset($bag)){

            $cuerpoCorreo = "Buen dia.\n";
            $cuerpoCorreo .= "Solicitamos de favor de enviar los siguientes suministros: ";
            $cuerpoCorreo .= "\n\n";

            foreach($bag as $serie => $items){
                $model = new ImpresoraModel();
                $model_loc = new LocalidadModel();
                $impresora = $model->where("no_serie",$serie)->first();

                $cuerpoCorreo .= "+ Para la impresora modelo " . $impresora->modelo;
                $cuerpoCorreo .= " con numero de serie " . $serie;
                $cuerpoCorreo .= " ubicada en la localidad de ";
                $cuerpoCorreo .= $model_loc->find($impresora->id_localidad)->localidad;
                $cuerpoCorreo .= "";

                foreach($items as $item){
                    $cuerpoCorreo .= "\n\t - " . $item["tipo"] . " ";
                    $cuerpoCorreo .= $item["modelo"] . " " . $item["color"] . ", nivel: " . $item["nivel"] . "%";
                }


                $cuerpoCorreo .= "\n\n";
            }

            $cuerpoCorreo .= "Se adjuntan los documentos correspondientes";
            $cuerpoCorreo .= "\nAtt.";

        }else{
            $cuerpoCorreo .= "No hay elementos en la bolsa";
        }

        
        $asunto = "Solicitud de suministros - - " . date("Y-m-d");
        


        $data['asunto'] = $asunto;
        $data["correos"] = $correos;
        $data["cuerpo"] = $cuerpoCorreo;
        $data["n_items"] = $n;
        $data["bag"] = $bag;
        
        return view('shoppingbag',$data);
    }

    public function newprinter(){

        $marcaModel = new MarcaModel();
        $localidadModel = new LocalidadModel();

        $data['marcas'] = $marcaModel->findAll();
        $data['localidades'] = $localidadModel->findAll();

        return view('new-printer',$data);
    }


    public function orderdetail($id){
        $db = db_connect();
        $query = "select * from detalle_pedidos where id_pedido = ?";
        $result = $db->query($query,[$id])->getResult();
        $model = new PedidoModel();
        $pedido = $model->find($id); 

        $data['detalle'] = $result;
        $data['id_pedido'] = $id;
        $data['codigo_entrega'] = $pedido->codigo_entrega;

        return view('detail-order',$data);
    }

    public function newcomponent($id){
        $db = db_connect();
        $colorModel = new ColorModel();
        $tiposComponente = new TiposComponenteModel();

        $data['colores'] = $colorModel->findAll();
        $data['tipos'] = $tiposComponente->findAll();
        $data['id_impresora'] = $id;
    
        return view("new-component",$data);
    }

}
