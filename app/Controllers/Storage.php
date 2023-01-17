<?php

namespace App\Controllers;

use App\Models\EmpleadoModel;
use App\Models\ImpresoraModel;
use App\Models\AsignacionModel;
use App\Models\ComponenteModel;
use App\Models\InstrumentoModel;

class Storage extends BaseController
{

    public function store_assignment(){
        $db = db_connect();

        $id_empleado = $_POST["empleado"];
        $id_modalidad = $_POST["modalidad"];
        $id_estado = $_POST["estado"];
        $comentario = $_POST["comentario"];

        $nombre = $_POST["nombre"];
        $tipo = $_POST["tipo"];
        $modelo = $_POST["modelo"];
        $noserie = $_POST["noserie"];
        $correo = null;
        $telefono = null;
        
        if(isset($_POST["correo"])){
            $correo = $_POST["correo"];
        }

        if(isset($_POST["telefono"])){
            $telefono = $_POST["telefono"];
        }


        $id_instrumento = null;
        $query = "select * from instrumentos where no_serie = ?";
        $result = $db->query($query,[$noserie])->getResult();
        d(count($result));
        if(count($result) == 1){
            $id_instrumento = $result[0]->id;
        }else{
            $instrumento['instrumento'] = $nombre;
            $instrumento['modelo'] = $modelo;
            $instrumento['no_serie'] = $noserie;
            $instrumento['correo'] = $correo;
            $instrumento['telefono'] = $telefono;
            $instrumento['id_tipo'] = $tipo;
            $modeloInstrumento = new InstrumentoModel();
            $modeloInstrumento->insert($instrumento);
            $id_instrumento = $modeloInstrumento->getInsertID();
        }
        
        $asignacion['id_empleado'] = $id_empleado;
        $asignacion['id_instrumento'] = $id_instrumento;
        $asignacion['id_modalidad'] = $id_modalidad;
        $asignacion['id_estado_entrega'] = $id_estado;
        $asignacion['id_estado_devolucion'] = 7;
        $asignacion['fecha_asignacion'] = date('Y-m-d');
        $asignacion['fecha_devolucion'] = null;
        $asignacion['comentario_entrega'] = $comentario;
        $modeloAsignacion = new AsignacionModel();
        $modeloAsignacion->insert($asignacion);
        
        return redirect()->to('//assignments//' . $id_empleado);

    }


    public function store_employee(){
        $db = db_connect();

        $empleado['codigo'] = $_POST['codigo'];
        $empleado['nombre'] = $_POST['nombre'];
        $empleado['numero_fijo'] = $_POST['fijo'];
        $empleado['numero_extension'] = $_POST['extension'];
        $empleado['id_cargo'] = $_POST['cargo'];
        $empleado['id_area'] = $_POST['area'];
        $empleado['id_localidad'] = $_POST['localidad'];

        $model = new EmpleadoModel();
        $model->insert($empleado);

        return redirect()->to("//assignments//");

    }


    public function store_printer(){
        $db = db_connect();

        $printer['id_marca'] = $_POST['marca'];
        $printer['id_localidad'] = $_POST['localidad'];
        $printer['modelo'] = $_POST['modelo'];
        $printer['no_serie'] = $_POST['noserie'];
        $printer['ip'] = $_POST['ip'];
        $printer['operando'] = $_POST['operando'];

        $model = new ImpresoraModel();
        $model->insert($printer);

        return redirect()->to("//printers//");
    }

}

?>
