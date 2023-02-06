<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Nuevo componente de impresora</h1>
        <h3></h3>
    </div>

    <form class="row" method="POST" action="/index.php/Storage/store_component">
        <input type="hidden" name="id_impresora" value="<?= $id_impresora ?>">
        <div class="form-group col-6 mt-4">
            <label for="">Tipo de componente</label>
            <?php
                $options = array();
                foreach($tipos as $tip){
                    $options[$tip->id] = $tip->tipo;
                }
                echo form_dropdown("tipo",$options,null,"class='form-control mt-2' id='tipos'");
            ?>
        </div>
        <div class="form-group col-6 mt-4">
            <label for="">Color:</label>
            <?php
                $options = array();
                foreach($colores as $co){
                    $options[$co->id] = $co->color;
                }
                echo form_dropdown("color",$options,null,"class='form-control mt-2' id='color'");
            ?>
        </div>
        <div class="form-group col-12 mt-4">
            <label for="">Modelo de componente:</label>
            <input type="text" name="modelo" id="" class="form-control">
        </div>
        <div class="form-group mt-4">
            <button class="btn btn-success" type="submit">Guardar</button>
        </div>

    </form>

<?= $this->endSection() ?>
<?= $this->section("scripts") ?>
<?= $this->endSection() ?>