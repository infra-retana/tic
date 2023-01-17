<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Crear Nueva Impresora:</h1>
        <h3></h3>
    </div>

    <form action="/index.php/Storage/store_printer" method="POST" class="row">
        <div class="form-group col-6 mt-4">
            <label for="">Modelo de la impresora:</label>
            <input type="text" name="modelo" id="" class="form-control">
        </div>
        <div class="form-group col-6 mt-4">
            <label for="">No. Serie</label>
            <input type="text" class="form-control" name="noserie">
        </div>
        <div class="form-group col-6 mt-4">
            <label for="">Marca de la impresora:</label>
            <?php
                $options = array();
                $selected = null;
                foreach($marcas as $marca){
                    $options[$marca->id] = $marca->marca;
                }
                echo form_dropdown("marca",$options,0,"class='form-control mt-2' id='marca'");
            ?>
        </div>
        <div class="form-group col-6 mt-4">
            <label for="">Localidad de la impresora:</label>
            <?php
                $options = array();
                $selected = null;
                foreach($localidades as $loc){
                    $options[$loc->id] = $loc->localidad;
                }
                echo form_dropdown("localidad",$options,0,"class='form-control mt-2' id='localidad'");
            ?>
        </div>
        <div class="form-group col-6 mt-4">
            <label for="">Direccion IP</label>
            <input type="text" class="form-control" name="ip">
        </div>
        <div class="form-group col-6 mt-4">
            <label for="">Operando:</label>
            <select class="form-control" name="operando">
                <option value="true">Sí</option>
                <option value="false">No</option>
            </select>
        </div>
        <div class="mt-4 col-12">
            <button type="submit" class="btn btn-success"> Guardar Nueva Impresora </button>
        </div>
    </form>

    

<?= $this->endSection() ?>
<?= $this->section("scripts") ?>
<?= $this->endSection() ?>