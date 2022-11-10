<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
   <style>
  table, th, td {
  border: 2px solid rgb(250, 12, 12);
}
body {background-color: rgb(143, 222, 233);}
   </style>
</head>
<body>
<?php

if(isset($_SESSION['id'])) {
    echo "Üdv ".$_SESSION['nev']."!";
    echo ' <a href="index.php?page=felhasznalo&action=kilepes">KILÉPÉS</a>';
}
else {
    echo '<a href="index.php?page=felhasznalo&action=belepes">BELÉPÉS</a>';
}

?>