<?php

require_once('../../controllers/MenuController.php');

$controller = new MenuController();
$menus = $controller->nav();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <link rel="stylesheet" type="text/css" href="../../src/site.css"></link>
</head>
<body>
    <div class="container">
        <nav>
            <div class="nav-left">
                <a href="index.php">Inicio</a>
            </div>
            <div class="nav-menu">
                <?php foreach($menus as $menu){ ?>
                    <div class="menu-container">
                        <a href="view.php?id=<?=$menu->id?>" >
                            <?=$menu->name?>
                        </a>
                        <?php if($menu->menu_depends) { 
                            foreach($menu->menu_depends as $submenu){ ?> 
                                <div class="submenu-container">
                                    <a href="view.php?id=<?=$submenu->id?>">- <?=$submenu->name?></a>
                                </div>
                            <?php } 
                        } ?>
                    </div>
                <?php } ?>
            </div>
        </nav>
    