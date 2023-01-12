<?php

session_start();

require 'db.inc.php';
$db = new DataBase();

require 'model/Osztaly.php';

$page = $_REQUEST['page'] ?? "index";

$controllerFile = 'controller/'.$page.'.php';

if(file_exists($controllerFile)) {
    require $controllerFile;
}

?>