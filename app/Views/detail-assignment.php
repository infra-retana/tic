<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Detalle de la asignacion, estado:</h1>
        <h3></h3>
    </div>

    <table class='table table-responsive'>
        <thead>
            <tr>
                <th>Dato</th>
                <th>Detalle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Nombre de empleado</th>
                <td><?= $asignacion->nombre_empleado ?></td>
            </tr>
            <tr>
                <th>Instrumento</th>
                <td><?= $asignacion->nombre_instrumento ?></td>
            </tr>
            <tr>
                <th>Modelo de instrumento</th>
                <td><?= $asignacion->modelo_instrumento ?></td>
            </tr>
            <tr>
                <th>No.Serie de instrumento</th>
                <td><?= $asignacion->serie_instrumento ?></td>
            </tr>
            <tr>
                <th>Tipo de instrumento</th>
                <td><?= $asignacion->tipo_instrumento ?></td>
            </tr>
            <tr>
                <th>Modalidad de asignacion</th>
                <td><?= $asignacion->modalidad ?></td>
            </tr>
            <tr>
                <th>Estado de entrega del instrumento</th>
                <td><?= $asignacion->estado_entrega ?></td>
            </tr>
            <tr>
                <th>Fecha de asignacion</th>
                <td><?= $asignacion->fecha_asignacion ?></td>
            </tr>
            <tr>
                <th>Comentario de asignacion</th>
                <td><?= $asignacion->comentario_entrega ?></td>
            </tr>
            <tr>
                <th>Estado de devolución</th>
                <td><?= $asignacion->estado_devolucion ?></td>
            </tr>
            <tr>
                <th>Fecha de devolución</th>
                <td><?= $asignacion->fecha_devolucion ?></td>
            </tr>
            <tr>
                <th>Comentario de devolucion</th>
                <td><?= $asignacion->comentario_devolucion ?></td>
            </tr>
        </tbody>
    </table>

<?= $this->endSection() ?>
<?= $this->section("scripts") ?>
<?= $this->endSection() ?>