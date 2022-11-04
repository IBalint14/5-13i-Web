<link rel="stylesheet" href="tablr.css">
<?php
    require_once 'model/db.inc.php';
    $db = new DataBase();
    require_once 'model/szemely.php';
    $szemely = new Szemely($db);
    require_once 'model/osztaly.php';
    print_r($_POST);

    $eredmeny = '';
    if(isset($_POST['felhnev'] && isset($_POST['jelszo']))){
        $login = $szemely->checkLogin($_POST['felhnev'], $_POST['jleszo']);
    }
?>

<title>Belépés</title>
<body>
    <form action="login.php" method="POST">
        Felhasználónév: <input type="text" name="felhnev" placehorder="Felhasználónév" required><br>
        Jelszó: <input type="password" name="jelszo" required><br>
        <input type="submit" value="Belépés" class="buttons">
    </from>
    <?php
        if($eredmeny == 'Sikertelen belépés: Hibás Jelszó! ' || $eredmeny == 'Nem létezik ilyen felhasználónév! '.$_POST['felhnev']){
            echo '<p class="errormessage">'.$eredmeny.'</p>';
        }else{
            echo '<p class="successmessage">'.$eredmeny.'</p>';
        }
    ?>
</body>
<button>"<a hfer=index.php>Vissza</a>"</button>