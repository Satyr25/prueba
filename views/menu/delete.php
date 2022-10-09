<?php
require_once('../../controllers/MenuController.php');

$controller = new MenuController();
$menu = $controller->delete($_GET['id']);
?>
