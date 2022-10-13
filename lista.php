<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablr.css">
<?php
require 'db.inc.php';
$db = new DataBase();

require 'model/Szemely.php';
$szemely = new Szemely($db);

require 'model/Osztaly.php';

?>
<title>Találati lista</title>
</head>
<body>
<?php

if(isset($_POST['keresettNev'])){
    if(strlen($_POST['keresettNev']) < 3){
        echo "<h2>Irj be legalább 3 karaktert a kereséshez</h2>";
    }
    else{
    if($talalatok = $szemely->nevetKeres($_POST['keresettNev'])){

        foreach($talalatok as  $kulcs=>$nev){
            echo "<h2><a href=\"index.php?szemelyId=$kulcs\">$nev</a></h2>";
        }
    }
    else {
        echo "<h2>Nem található ilyen név: ".$_POST['keresettNev']."</h2>";
        }
    }
 }			
    ?>
    <hr>
    <a href="index.php"><< Vissza</a>
</body>
</html>