<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Componentes de pedido para CYC</h1>
        <h3 class="text-secondary">
            <?php if($n_items == 0) { echo "No hay elementos en la lista"; } ?>
            <?php if($n_items > 0) { echo "Hay " . $n_items . " componentes en la bolsa de pedido"; } ?>
        </h3>
    </div>

    <div class="mt-5 card">
        <div class="card-header">
            <b>Destinatarios</b>
            <?php
                $data = [
                    'type' => 'text',
                    'name' => 'destinatarios', 
                    'value' => $correos,
                    'class' => 'form-control mt-2'
                ];
                echo form_input($data);
            ?>
        </div>
        <div class="card-body">
            <pre><?= $cuerpo ?></pre>
        </div>
    </div>

    <table class="table table-responsive mt-4">
        <thead>
            <tr>
                <th>Id</th>
                <th>Serie Impresor</th>
                <th>Tipo</th>
                <th>Color</th>
                <th>Nivel</th>
                <th>Opcion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($bag as $serie => $items){ ?> 
                <?php foreach($items as $item) { ?> 
                    <tr>
                        <td><?= $item["id"] ?></td>
                        <td> <?= $serie ?> </td>
                        
                        <td><?= $item["tipo"] ?></td> 
                        <td><?= $item["color"] ?></td> 
                        <td><?= $item["nivel"] ?></td> 
                        <td> 
                            <form action="/index.php/Delete/bagitem" method="POST">
                                <input type="hidden" name="id" value="<?= $item["id"] ?>">
                                <button type="submit" class="btn btn-sm btn-danger"> Eliminar </button>
                            </form>    
                        </td>
                    </tr>   
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>

<?= $this->endSection() ?>
<?= $this->section("scripts") ?>
<?= $this->endSection() ?>