<?php
require_once('../../controllers/MenuController.php');

$controller = new MenuController();
$menu_view = $controller->view($_GET['id']);
?>

<?php require_once('../layout/header.php'); ?>

<h1><?=$menu_view->name?></h1>
<h2><?=$menu_view->description?></h2>

<?php require_once("../layout/footer.php"); ?>