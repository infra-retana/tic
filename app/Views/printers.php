<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Lista de impresoras</h1>

        <div class="row mt-4">
            <div class="col-9">
                <form action="/index.php/Home/printers" method="GET">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class='fa fa-search'></i></span>
                        <input type="text" name="search" class="form-control" placeholder="Criterios de busqueda [Localidad, No.Serie]" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </form>
            </div>
            <div class="col-3 ">
                <a href="<?= url_to("\App\Controllers\Home::lowlevels") ?>"   class="btn btn-secondary btn-block">
                    <i class="fa-solid fa-filter mx-2"></i>
                    Filtrar Niveles Bajos
                </a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <a href="<?= url_to("\App\Controllers\Home::newprinter") ?>" class="btn btn-sm btn-success">
                    <i class="fa-solid fa-print mx-2"></i>    
                    Crear Nueva Impresora
                </a>
            </div>
        </div>
    </div>
    
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Localidad</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>No. Serie</th>
                <th>Activa</th>
                <th>Dirección IP</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($impresoras as $printer){  ?>
                <tr>
                    <td> <?= $printer->localidad ?> </td>
                    <td> <?= $printer->marca ?> </td>
                    <td> <?= $printer->modelo ?> </td>
                    <td> <?= $printer->no_serie ?> </td>
                    <td> 
                        <?php if($printer->activa == "No"){ ?>
                            <span class="bg-danger"> <?= $printer->activa ?>  </span>
                        <?php } else { ?>
                            <?= $printer->activa ?> 
                        <?php } ?>
                    </td>
                    <td> <a href="<?= "\\" . $printer->ip ?>"><?= $printer->ip ?></a> </td>
                    <td> 
                        <a href="<?= url_to("\App\Controllers\Home::components",$printer->id) ?>" class="btn btn-sm btn-warning"> 
                        <i class="fa-solid fa-droplet"></i> </a> 

                        <a href="<?= url_to("\App\Controllers\Home::components",$printer->id) ?>" class="btn btn-sm btn-primary"> 
                        <i class="fa-solid fa-pencil"></i> </a> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    

<?= $this->endSection() ?>