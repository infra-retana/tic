<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5" >
        <h1>Detalle del pedido:</h1>
        <form action="/index.php/Update/codigo_entrega" method="POST" class="mt-4 row">
            <b class="d-block mb-2">Añadir codigo de entrega:</b>
            <div class="col-9">
                <input type="hidden" name="id_pedido" value="<?= $id_pedido ?>">
                <input type="text" class="form-control" name="codigo" value=<?= $codigo_entrega ?>>
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>

    <table class="table table-responsive">
        <tr>
            <th>Tipo</th>
            <th>Modelo</th>
            <th>Color</th>
            <th>Fecha de solicitud</th>
            <th>Fecha de entrega</th>
        </tr>
        <?php foreach($detalle as $com){ ?> 
            <tr>
                <td><?= $com->tipo ?></td>
                <td><?= $com->marca ?></td>
                <td><?= $com->modelo_componente ?></td>
                <td><?= $com->color ?></td>
                <td><?= $com->fecha_solicitud ?></td>
                <td><?= $com->fecha_entrega ?></td>
            </tr>
        <?php } ?>
    </table>

<?= $this->endSection() ?>
<?= $this->section("scripts") ?>
<?= $this->endSection() ?>