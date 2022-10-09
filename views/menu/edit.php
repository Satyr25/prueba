<?php
require_once('../../controllers/MenuController.php');

$controller = new MenuController();
$data = $controller->edit($_GET['id']);
$menu_old = $data['menu'];
$depends = $data['all'];
?>

<?php require_once('../layout/header.php'); ?>

<div>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?=$menu_old->id?>">
        <label for="">Nombre</label>
        <br>
        <input type="text" name="name" value="<?=$menu_old->name?>" class="input-form" required>
        <br>
        <br>
        <label for="">Descripción</label>
        <br>    
        <input type="text" name="description"  value="<?=$menu_old->description?>" class="input-form" required>
        <br>
        <br>
        <label for="">Menu Padre</label>
        <br>
        <select name="depend" class="input-form">
            <option value="0" >Sin relación</option>
            <?php foreach ($depends as $depend) { ?> 
                <option value="<?=$depend->id?>" <?=$menu_old->depend == $depend->id ? 'selected' : '' ?> ><?=$depend->name?></option>
            <?php } ?>
        </select>
        <br>
        <br>
        <button type="submit" class="action-btn">Guardar</button>
    </form>
</div>

<?php require_once("../layout/footer.php"); ?>