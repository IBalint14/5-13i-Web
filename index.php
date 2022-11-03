<?php
session_start();
    require 'db.inc.php';
    $db = new DataBase();

    $page = "felhasznalo";

    $controllerFile = 'controller/'.$page.'.php';

    if(file_exists($controllerFile)){
        require $controllerFile;

    }


?>