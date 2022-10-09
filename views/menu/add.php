<?php
require_once('../../controllers/MenuController.php');

$controller = new MenuController();
$depends = $controller->add();
?>

<?php require_once('../layout/header.php'); ?>

<div>
    <form action="" method="POST">
        <label for="">Nombre</label>
        <br>
        <input type="text" name="name" class="input-form" required>
        <br>
        <br>
        <label for="">Descripción</label>
        <br>
        <input type="text" name="description" class="input-form" required>
        <br>
        <br>
        <label for="">Menu Padre</label>
        <br>
        <select name="depend" class="input-form" >
            <option value="0" >Opcional</option>
            <?php foreach ($depends as $depend) { ?> 
                <option value="<?=$depend->id?>"><?=$depend->name?></option>
            <?php } ?>
        </select>
        <br>
        <br>
        <button type="submit" class="action-btn">Guardar</button>
    </form>
</div>


<?php require_once("../layout/footer.php"); ?>