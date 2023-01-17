<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Asignaciones activas del empleado:</h1>
        <h3><?= $empleado->nombre ?></h3>
    </div>


    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Instrumento</th>
                <th>Tipo</th>
                <th>Modelo</th>
                <th>No. Serie</th>
                <th>Modalidad</th>
                <th>Fecha de asignacion</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($asignaciones_activas as $ass){ ?>
                <tr>
                    <td><?= $ass->nombre_instrumento ?></td>
                    <td><?= $ass->tipo_instrumento ?></td>
                    <td><?= $ass->modelo_instrumento ?></td>
                    <td><?= $ass->serie_instrumento ?></td>
                    <td><?= $ass->modalidad ?></td>
                    <td><?= $ass->fecha_asignacion ?></td>
                    <td>
                        <a href="<?= url_to("\App\Controllers\Home::returns",$ass->id_asignacion) ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-right-to-bracket"></i></a>
                        <a href="<?= url_to("\App\Controllers\Home::detailassignment",$ass->id_asignacion) ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-list"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="bg-orange py-5">
        <h1>Historial de asignaciones</h1>
    </div>

    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Instrumento</th>
                <th>Tipo</th>
                <th>Modelo</th>
                <th>No. Serie</th>
                <th>Modalidad</th>
                <th>Fecha de devolucion</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($asignaciones_historial as $ass){ ?>
                <tr>
                    <td><?= $ass->nombre_instrumento ?></td>
                    <td><?= $ass->tipo_instrumento ?></td>
                    <td><?= $ass->modelo_instrumento ?></td>
                    <td><?= $ass->serie_instrumento ?></td>
                    <td><?= $ass->modalidad ?></td>
                    <td><?= $ass->fecha_devolucion ?></td>
                    <td>
                        <a href="<?= url_to("\App\Controllers\Home::detailassignment",$ass->id_asignacion) ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-list"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?= $this->endSection() ?>