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
   </style>
   <script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>
<header class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Osztályok
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
        
        foreach($osztalyok as $kulcs => $ertek) {
            if($kulcs != $osztaly) {
                echo "<a class=\"dropdown-item\" href=\"index.php?osztalyId=$kulcs\">$ertek</a>";
            }  
            else {
                echo "<a class=\"dropdown-item disabled\" href=\"index.php?osztalyId=$kulcs\">$ertek</a>"; 
            }
        }
        ?>
        </div>
      </li>
      <li class="nav-item">
        <?php

        if(isset($_SESSION['id'])) {
            echo "Üdv ".$_SESSION['nev']."!";
            echo ' <a class="nav-link" href="index.php?page=felhasznalo&action=kilepes">KILÉPÉS</a>';
        }
        else {
            echo '<a class="nav-link" href="index.php?page=felhasznalo&action=belepes">BELÉPÉS</a>';
        }

        ?>
      </li>
    </ul>
  </div>
  <div class="ml-auto">
    <form method="post" action="index.php" class="form-inline">
        <input type="hidden" name="page" value="felhasznalo">
        <input type="hidden" name="action" value="kereses">  
        <input name="keresettNev" class="form-control ml-sm-2" type="search" placeholder="Keresés" aria-label="Search" onkeyup="showHint(this.value)">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Keresés</button>
    </form>
    </div>
</nav>
</header>   