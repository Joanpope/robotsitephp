<section class="content-header">
    <h1 class="titol_margin">
        Editar trabajador
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <form id="worker_edit" role="form" action="" method="POST">
                <div class="form-group col-md-6 col-xs-12">
                    <label for="worker_username">Usuario:</label>
                    <div class="magic-span">
                        <input type="text" class="form-control" name="worker_username" 
                           id="worker_username" value="<?php echo $data['worker']->getUsername()?>">
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="worker_nif">NIF:</label>
                    <div class="magic-span">
                        <input type="text" class="form-control" name="worker_nif" 
                           id="worker_nif" value="<?php echo $data['worker']->getNif()?>">
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="worker_password">Contraseña:</label>
                    <div class="magic-span">
                        <input type="password" class="form-control" name="worker_password" 
                           id="worker_password" value="<?php echo $data['worker']->getPassword()?>">
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="worker_re_password">Confirmar contraseña:</label>
                    <div class="magic-span">
                        <input type="password" class="form-control" name="worker_re_password" 
                           id="worker_re_password" value="<?php echo $data['worker']->getPassword()?>">
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="worker_name">Nombre:</label>
                    <div class="magic-span">
                        <input type="text" class="form-control" name="worker_name" 
                           id="worker_name" value="<?php echo $data['worker']->getName()?>">
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="worker_surname">Apellido:</label>
                    <div class="magic-span">
                        <input type="text" class="form-control" name="worker_surname" 
                           id="worker_surname" value="<?php echo $data['worker']->getSurname()?>">
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="worker_mobile">Mobile:</label>
                    <div class="magic-span">
                        <input type="text" class="form-control" name="worker_mobile" 
                           id="worker_mobile" value="<?php echo $data['worker']->getMobile()?>">
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="worker_telephone">Teléfono:</label>
                    <div class="magic-span">
                        <input type="text" class="form-control" name="worker_telephone" 
                           id="worker_telephone" value="<?php echo $data['worker']->getTelephone()?>">
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="worker_category">Categoría:</label>
                    <div class="magic-span">
                        <input type="text" class="form-control" name="worker_category" 
                           id="worker_category" value="<?php echo $data['worker']->getCategory()?>">
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label>Equipo:</label>
                    <div class="magic-span">
                        <?php
                        App\Utility\QuickForm::createSelect("worker_team", "name", $data['teams'], $data['worker']->getTeam()->getId());
                        ?>
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="worker_is_admin">Admin:</label>
                    <label class="radio-inline"><input type="radio" value="1" name="worker_is_admin"
                        <?php echo ($data['worker']->getIsAdmin() == 1) ? 'checked' : ''; ?>>Sí</label>
                    <label class="radio-inline"><input type="radio" value="0" name="worker_is_admin" 
                        <?php echo ($data['worker']->getIsAdmin() == 0) ? 'checked' : ''; ?>>No</label>
                </div>
                <div class="col-xs-12 margin-bottom">
                    <input type="submit" class="btn btn-primary" value="Editar" name="worker_edit">
                    <a href=".." class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo URL; ?>public/js/validation/worker/edit.js"></script>
    <?php
    if (isset($data)) {
        if (array_key_exists("error", $data)) {
            App\Utility\QuickForm::showListErrors($data["error"]);
        }
    }
    ?>