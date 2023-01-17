<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Devolución del Instrumento</h1>
        <h3>
            <?= 
                $instrumento->instrumento . " " .  
                $instrumento->modelo . " - " .
                $instrumento->no_serie
            ?>
        </h3>
    </div>

    <form action="/index.php/Update/devolucion_instrumento" method="POST">
        <input type="hidden" name="id_empleado" value="<?= $asignacion->id_empleado ?>">
        <input type="hidden" name="id_asignacion" value="<?= $asignacion->id ?>">
        <div class="row">
            <div class="col-6 form-group">
                <label for="estado">Estado de devolución:</label>
                <select name="estado" id="" class="form-control mt-2">
                    <?php foreach($estados as $es){ ?> 
                        <option class="" value="<?= $es->id ?>"> <?= $es->estado ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-6 form-group">
                <label for="fecha">Fecha de devolución:</label>
                <input type="date" name="fecha" value="<?= date('Y-m-d') ?>" class="form-control mt-2">
            </div>
            <div class="col-12 form-group mt-4">
                <label for="comentario">Comentarios:</label>
                <textarea name="comentario" rows="5" cols="3" class="form-control"></textarea>
            </div>
            <div class="col mt-4">
                <button class="btn btn-success">Proceder con devolución</button>
            </div>
        </div>
    </form>


<?= $this->endSection() ?>
<?= $this->section("scripts") ?>
<?= $this->endSection() ?>
