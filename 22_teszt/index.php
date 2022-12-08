<?php

session_start();

require 'db.inc.php';
$db = new DataBase();

require 'model/Osztaly.php';

$osztaly = 1;

if(isset($_REQUEST['osztalyId'])) {
    $osztaly = $_REQUEST['osztalyId'];
}

$page = $_REQUEST['page'] ?? "index";

$controllerFile = 'controller/'.$page.'.php';

if(file_exists($controllerFile)) {
    require $controllerFile;
}

?>