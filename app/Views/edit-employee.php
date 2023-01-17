<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Editar empleado</h1>
        <h3></h3>
    </div>

    <form action="/index.php/Update/edit_employee" class="" method="POST">
        <?php
            if(isset($empleado)){
                $data = ['type' => 'hidden',
                'name' => 'id', 
                'id' => 'id', 
                'value' => $empleado->id,
                'class' => 'form-control'
                ];
                echo form_input($data);
            }
        ?>
        <div class="row">
            <div class="col-9 mt-2">
                <div class="form-group">
                    <label for="nombre">Nombre del empleado:</label>
                    <?php
                        if(isset($empleado)){
                            $data = ['type' => 'text',
                            'name' => 'nombre', 
                            'id' => 'nombre', 
                            'value' => $empleado->nombre,
                            'class' => 'form-control'
                            ];
                            echo form_input($data);
                        }
                    ?>
                </div>
            </div>
            <div class="col-3 mt-2">
                <div class="form-group">
                    <label for="codigo">Codigo del empleado:</label>
                    <?php
                        if(isset($empleado)){
                            $data = ['type' => 'text',
                            'name' => 'codigo', 
                            'id' => 'codigo', 
                            'value' => $empleado->codigo,
                            'class' => 'form-control'
                            ];
                            echo form_input($data);
                        }
                    ?>
                </div>
            </div>
            <div class="col-9 mt-2">
                <div class="form-group">
                    <label for="fijo">Numero fijo:</label>
                    <?php
                        if(isset($empleado)){
                            $data = ['type' => 'text',
                            'name' => 'fijo', 
                            'id' => 'fijo', 
                            'value' => $empleado->numero_fijo,
                            'class' => 'form-control'
                            ];
                            echo form_input($data);
                        }
                    ?>
                </div>
            </div>
            <div class="col-3 mt-2">
                <div class="form-group">
                    <label for="extension">Numero de extensión:</label>
                    <?php
                        if(isset($empleado)){
                            $data = ['type' => 'text',
                            'name' => 'extension', 
                            'id' => 'extension', 
                            'value' => $empleado->numero_extension,
                            'class' => 'form-control'
                            ];
                            echo form_input($data);
                        }
                    ?>
                </div>
            </div>
            <div class="col-6 mt-2">
                <div class="form-group">
                    <label for="">Cargo de trabajo:</label>
                    <?php
                        $options = array();
                        $selected = null;
                        foreach($cargos as $car){
                            $options[$car->id] = $car->cargo;
                            if(isset($empleado)){
                                if($empleado->id_cargo == $car->id) $selected = $car->id;
                            }
                        }
                        echo form_dropdown("cargo",$options,$selected,"class='form-control mt-2' id='cargo'");
                    ?>
                </div>
            </div>
            <div class="col-6 mt-2">
                <div class="form-group">
                    <label for="">Area de trabajo:</label>
                    <?php
                        $options = array();
                        $selected = null;
                        foreach($areas as $area){
                            $options[$area->id] = $area->codigo . " - " . $area->area;
                            if($empleado->id_area == $area->id) $selected = $area->id;
                        }
                        echo form_dropdown("area",$options,$selected,"class='form-control mt-2' id='area'");
                    ?>
                </div>
            </div>
            <div class="col-6 mt-2">
                <div class="form-group">
                    <label for="localidad">Localidad de trabajo:</label>
                    <?php
                        $options = array();
                        $selected = null;
                        foreach($localidades as $loc){
                            $options[$loc->id] = $loc->localidad;
                            if($empleado->id_localidad == $loc->id) $selected = $loc->id;
                        }
                        echo form_dropdown("localidad",$options,$selected,"class='form-control mt-2' id='localidad'");
                    ?>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-5">Guardar</button>
    </form>

<?= $this->endSection() ?>
<?= $this->section("scripts") ?>
<?= $this->endSection() ?>