<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Lista de componentes</h1>
        <h4>
            Impresora modelo: 
            <?= $impresora->modelo ?>
        </h4>
    </div>
    
    <form action="/index.php/Update/niveles_componetes" method="POST" id="nivelesform">
        <input type="hidden" name="id_impresora" value="<?= $impresora->id ?>">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th></th>
                    <th>Tipo</th>
                    <th>Color</th>
                    <th>Modelo</th>
                    <th>Ult. Fecha Actualización</th>
                    <th>Ult. Fecha Instalación</th>
                    <th>Nivel</th>
                </tr>
            </thead>
            <tbody>
                
                    <?php foreach($componentes as $component){  ?>
                        <tr>
                            <td><input type="checkbox" name="<?= "check_" . $component->id ?>" value="false" onchange="enablebox(this)"></td>
                            <td> <?= $component->tipo ?> </td>
                            <td> <?= $component->color ?> </td>
                            <td class="fit"> <?= $component->modelo ?> </td>
                            <td> <?= $component->actualizacion_nivel ?> </td>
                            <td> <?= $component->fecha_instalacion ?> </td>
                            
                            <td>
                                <input type="text" name="<?= "nivel_" . $component->id  ?>" class="form-control" value="<?= $component->nivel ?>" disabled>     
                            </td>
                            
                        </tr>
                    <?php } ?>
                
            </tbody>
        </table>
        <div class="row">
            <div class="col-12">
                <button class="btn btn-primary">Editar</button>
                <button class="btn btn-success" type="button" name="btn_levels" value="levels" onclick="submitform()">Actualizar Niveles</button>
                <button class="btn btn-warning" type="submit" name="btn_bag" value="bag">Añadir a bolsa de pedido</button>
            </div>
        </div>
    </form>

    <form action="" class="mt-4" method="POST">
        <input type="hidden" name="componentes">
        
    </form>

    <script>
        function submitform(){
            if(confirm("Confirmar Actualizacion?")){
                document.getElementById("nivelesform").submit();
            }
        }

        function enablebox(check){
            var id = check.name.replace("check_","");
            var input = document.getElementsByName('nivel_' + id)[0];
            input.disabled = !input.disabled;
        }
    </script>

<?= $this->endSection() ?>