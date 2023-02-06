<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Pedidos de Suministros CYC </h1>
        <div class="row mt-4">
            <div class="col-9">
                <form action="/index.php/Home/orders" method="GET">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class='fa fa-search'></i></span>
                        <input type="text" name="search" class="form-control" placeholder="Criterios de busqueda [Codigo de entrega]" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </form>
            </div>
            <div class="col-3">
                <a href="<?= url_to("\App\Controllers\Home::bag") ?>" class="btn btn-success btn-block"> 
                    <i class="fa-solid fa-bag-shopping mx-2"></i> Ver bolsa <?= "(" . $items . ")" ?>
                </a>
            </div>
        </div>
    </div>

    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Codigo Pedido</th>
                <th>Codigo Entrega</th>
                <th>Fecha Solicitud</th>
                <th>Fecha de Entrega</th>
                <th>Numero de Items</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pedidos as $or) { ?>
                <tr>
                    <td> <?= $or->codigo ?> </td>
                    <td> <?= $or->codigo_entrega ?> </td>
                    <td> <?= $or->fecha_solicitud ?> </td>
                    <td> <?= $or->fecha_entrega ?> </td>
                    <td> <?= $or->items ?> </td>
                    <td>
                        <?php if($or->fecha_entrega == null) { ?>
                            <a href="#" class="btn btn-primary btn-sm">Complementar</a>
                        <?php } else { ?> 
                            <a href="<?= "/index.php/orders/detail/" . $or->id ?>" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-bars-staggered"></i> Detalles
                            </a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            
        </tbody>
    </table>


<?= $this->endSection() ?>
<?= $this->section("scripts") ?>
<?= $this->endSection() ?>