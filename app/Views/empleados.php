<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Lista de empleados</h1>
        <div class="row mt-4">
            <div class="col-9">
                <form action="/Home/assignments" method="GET">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class='fa fa-search'></i></span>
                        <input type="text" name="search" class="form-control" placeholder="Criterios de busqueda [Codigo, Nombre]" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </form>
            </div>
            <div class="col-3">
                <a href="<?= url_to("\App\Controllers\Home::newemployee") ?>" class="btn btn-success btn-block"> 
                    <i class="fa fa-add"></i> Nuevo Empleado
                </a>
            </div>
        </div>
    </div>


    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre Completo</th>
                <th>Area</th>
                <th>Cargo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($empleados as $emp){ ?>
                <tr>
                    <td><?= $emp->codigo ?></td>
                    <td><?= $emp->nombre ?></td>
                    <td><?= $emp->area ?></td>
                    <td><?= $emp->cargo ?></td>
                    <td>
                        <a href="<?= url_to("\App\Controllers\Home::listassignments",$emp->id_empleado) ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-key"></i></a>
                        <a href="<?= url_to("\App\Controllers\Home::newassignment",$emp->id_empleado) ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-add"></i></a>
                        <a href="<?= url_to("\App\Controllers\Home::editemployee",$emp->id_empleado) ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i></a>
                        
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?= $this->endSection() ?>