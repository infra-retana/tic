<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Agregar un nuevo empleado</h1>
        <h3></h3>
    </div>

    <form action="Storage/store_employee" class="" method="POST">
        <div class="row">
            <div class="col-9 mt-2">
                <div class="form-group">
                    <label for="nombre">Nombre del empleado:</label>
                    <input type="text" name="nombre" id="" class="form-control">
                </div>
            </div>
            <div class="col-3 mt-2">
                <div class="form-group">
                    <label for="codigo">Codigo del empleado:</label>
                    <input type="text" name="codigo" id="" class="form-control">
                </div>
            </div>
            <div class="col-9 mt-2">
                <div class="form-group">
                    <label for="fijo">Numero fijo:</label>
                    <input type="text" name="fijo" id="" class="form-control">
                </div>
            </div>
            <div class="col-3 mt-2">
                <div class="form-group">
                    <label for="extension">Numero de extensión:</label>
                    <input type="text" name="extension" id="" class="form-control">
                </div>
            </div>
            <div class="col-6 mt-2">
                <div class="form-group">
                    <label for="">Cargo de trabajo:</label>
                    <?php
                        $options = array();
                        foreach($cargos as $car){
                            $options[$car->id] = $car->cargo;
                        }
                        echo form_dropdown("cargo",$options,1,"class='form-control mt-2' id='cargo'");
                    ?>
                </div>
            </div>
            <div class="col-6 mt-2">
                <div class="form-group">
                    <label for="">Area de trabajo:</label>
                    <?php
                        $options = array();
                        foreach($areas as $area){
                            $options[$area->id] = $area->codigo . " - " . $area->area;
                        }
                        echo form_dropdown("area",$options,1,"class='form-control mt-2' id='area'");
                    ?>
                </div>
            </div>
            <div class="col-6 mt-2">
                <div class="form-group">
                    <label for="localidad">Localidad de trabajo:</label>
                    <?php
                        $options = array();
                        foreach($localidades as $loc){
                            $options[$loc->id] = $loc->localidad;
                        }
                        echo form_dropdown("localidad",$options,1,"class='form-control mt-2' id='localidad'");
                    ?>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-5">Guardar</button>
    </form>

<?= $this->endSection() ?>
<?= $this->section("scripts") ?>
<?= $this->endSection() ?>