<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Detalle del pedido:</h1>
        <h3>Añadir codigo de entrega:</h3>
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