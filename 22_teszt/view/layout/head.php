<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title><?php echo $title; ?></title>
   <style>
  table, th, td {
  border: 2px solid rgb(250, 12, 12);
}
body {background-color: rgb(143, 222, 233);}

:root {
    --orange: #FA8F54;
}
.navbar{
    font-size: 18px;
    height: 50px;
    background-color: #2F4858 !important;
    padding: 40px 20px;
}

.nav-link {
    color: #fff !important;
    border-radius: 15px !important;
    padding: 8px 20px !important;
    transition: all .2s;
}

.nav-link:active, .nav-link:hover {
    color: var(--orange) !important;
}

.nav-link.active {
    background-color: var(--orange) !important;
    color: #001524 !important;
}
   </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Kezdőlap</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Osztályokkezelő <span class="sr-only"></span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Osztályok
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">13.i</a>
          <a class="dropdown-item" href="#">12.i</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">13.i</a>
      </li>
    </ul>
    <div class="input-group">
        <input class="form-control" id="search" type="text" placeholder="Keresés" aria-describedby="button-addon1">
        <button class="btn btn-secondary" type="submit">Küldés</button>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php

if(isset($_SESSION['id'])) {
    echo "Üdv ".$_SESSION['nev']."!";
    echo ' <a href="index.php?page=felhasznalo&action=kilepes">KILÉPÉS</a>';
}
else {
    echo '<a href="index.php?page=felhasznalo&action=belepes">BELÉPÉS</a>';
}

?>