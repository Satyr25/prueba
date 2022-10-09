<?php
require_once('../../controllers/MenuController.php');

$controller = new MenuController();
$index_menus = $controller->index();
?>

<?php require_once('../layout/header.php'); ?>

<div class="table-head">
    <a href="add.php" class="add-btn">Nuevo</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Menú Padre</th>
        <th>Acciones</th>
    </tr>
    <?php foreach($index_menus as $menu){ ?> 
        <tr>
            <td><?=$menu->id?></td>
            <td><?=$menu->name?></td>
            <td><?=$menu->description?></td>
            <td>
                <?php if($menu->father_name){ ?> 
                    <?=$menu->father_name?>
                <?php } ?>
            </td>
            <td>
                <a href="edit.php?id=<?=$menu->id?>" class="action-btn">Editar</a>
                <a href="delete.php?id=<?=$menu->id?>" class="action-btn">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</table>


<?php require_once("../layout/footer.php"); ?>