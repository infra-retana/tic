<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Lista de componentes con niveles bajos</h1>
        <div class="mt-4">
            <button class="btn btn-warning">Pedir componentes seleccionados</button>
        </div>
    </div>


    <table class="table table-responsive">
        <thead>
            <tr>
                <th></th>
                <th>Serie Impresor</th>
                <th>Tipo</th>
                <th>Color</th>
                <th>Modelo</th>
                <th>Nivel</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($componentes as $com){ ?>
                <tr>
                    <td>
                        <input type="checkbox" name="<?= "check_" . $com->id?>" id="">
                    </td>
                    <td><?= $com->serie_impresora ?></td>
                    <td><?= $com->tipo ?></td>
                    <td><?= $com->color ?></td>
                    <td><?= $com->modelo ?></td>
                    <td><?= $com->nivel ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?= $this->endSection() ?>