<?= $this->extend("baselayout") ?>
<?= $this->section("content") ?>

    <div class="bg-orange py-5">
        <h1>Nueva asignacion para el empleado:</h1>
        <h3><?= $empleado->codigo . " - " . $empleado->nombre ?></h3>
    </div>

    <form action="<?= '/index.php/Home/newassignment/' . $empleado->id ?>" method="POST">
        <label for="search" class="mb-2">Buscador:</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class='fa fa-search'></i></span>
            <input require type="text" name="search" class="form-control" placeholder="Numero de Serie & IMEI"  aria-describedby="basic-addon1">
        </div>
    </form>

    <?php if(isset($error)) { ?>

        <div class="alert alert-warning" role="alert">
            <i class="fa-solid fa-warning mx-2"></i> <?= $error ?>
        </div>

    <?php }?>

    <form method="POST" action="/index.php/Storage/store_assignment" enctype='multipart/form-data'>
        <input type="hidden" name="empleado" value="<?= $empleado->id ?>">
        
        <div class="row">
            <div class='col-6 form-group mt-4'>
                <label for="noserie">Numero de serie:</label>
                <input type="text" name="noserie" class="form-control mt-2" value="<?= isset($instrumento) ? $instrumento->no_serie : ''  ?>">
            </div>
            <div class="col-6 form-group mt-4">
                <label for="nombre">Nombre del instrumento:</label>
                <input type="text" name="nombre" id="" class="form-control mt-2" value="<?= isset($instrumento) ? $instrumento->instrumento : ''  ?>">
            </div>
            <div class="col-6 form-group mt-4">
                <label for="tipo">Tipo de instrumento:</label>
                <?php
                    $options = array();
                    $selected = null;
                    foreach($tipos_instrumento as $tipo){
                        $options[$tipo->id] = $tipo->tipo;
                        if(isset($instrumento)){
                            if($instrumento->id_tipo == $tipo->id) $selected = $tipo->id;
                        }
                    }
                    echo form_dropdown("tipo",$options,$selected,"class='form-control mt-2' id='tipo'" . $selected);
                ?>
            </div>
            <div class="col-6 form-group mt-4">
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" id="" class="form-control mt-2" value="<?= isset($instrumento) ? $instrumento->modelo : ''  ?>">
            </div>
            <div class="col-6 form-group mt-4">
                <label for="correo">Correo electrónico:</label>
                <input type="text" name="correo" id="correo" class="form-control mt-2" disabled value="<?= isset($instrumento) ? $instrumento->correo : ''  ?>">
            </div>
            <div class="col-6 form-group mt-4">
                <label for="telefono">Numero de Teléfono:</label>
                <input type="text" name="telefono" id="telefono" class="form-control mt-2" disabled value="<?= isset($instrumento) ? $instrumento->telefono : ''  ?>">
            </div>
            <div class="col-6 form-group mt-4">
                <label for="estado">Estado del instrumento:</label>
                <select name="estado" id="" class="form-control mt-2">
                    <?php foreach($estados_instrumento as $est){ ?>
                        <option value="<?= $est->id ?>"><?= $est->estado ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="col-6 form-group mt-4">
                <label for="modalidad">Modalidad de asignación:</label>
                <select name="modalidad" id="" class="form-control mt-2">
                    <?php foreach($modalidades as $mod){ ?>
                        <option value="<?= $mod->id ?>"><?= $mod->modalidad ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-6 form-group mt-4">
                <label for="telefono">Comentario:</label>
                <textarea name="comentario" cols="30" rows="3" class="form-control mt-2"></textarea>
            </div>
            <div class="col-6 form-group mt-4">
                <label for="telefono">Adjuntar fotografia:</label>
                <div class="input-group mt-2">
                    <input type="file" class="form-control" name="foto_entrega" id="inputGroupFile02">
                </div>
            </div>
            <div class="col-12 mt-4">
                <button class="btn btn-secondary">Cancelar</button>
                <?php if(isset($instrumento)){ ?> <button class="btn btn-primary mx-2"> Asignar</button> <?php } ?>
                <?php if(!isset($instrumento)){ ?> <button class="btn btn-success mx-2"> Crear y Asignar</button> <?php } ?>
            </div>
        </div>

    </form>


<?= $this->endSection() ?>
<?= $this->section("scripts") ?>

    <script>

        window.addEventListener('load', function () {
            toggleFields(document.getElementById('tipo'));
        });

        document.getElementById('tipo').addEventListener('change',function(){
            toggleFields(document.getElementById('tipo'));
        });

        function toggleFields(combo){
            var stroption = combo.selectedOptions[0].text;
            var tel = document.getElementById('telefono');
            var cor = document.getElementById('correo');

            tel.disabled = true;
            cor.disabled = true;
            
            if(stroption.toLowerCase() == "celular" || stroption.toLowerCase() == "teléfono ip"){
                tel.disabled = false;
            }else if( stroption.toLowerCase() == "correo"){
                cor.disabled = false;
            }
        }
    </script>

<?= $this->endSection() ?>