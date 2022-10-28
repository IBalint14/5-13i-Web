<?php
session_start();


if(isset($_GET['kilepes'])){
    session_unset();
}

?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablr.css">
    <style><?php include 'tablr.css'; ?></style>
        <?php
        require 'db.inc.php';
        $db= new DataBase();

        require 'model/Szemely.php';
        $szemely = new Szemely($db);
        require 'model/osztaly.php';


        $eredmény = "";
        $eredmenySzovegek = array(
            "Nincs ilyen felhasználónév",
            "Sikertelen belépés: hibás jelszó",
            "Sikeres belépés"
        );

        if(isset($_POST['felhasznalonev']) && isset($_POST['jelszo'])){
            $login = $szemely-> checkLogin($_POST['felhasznalonev'],$_POST['jelszo']);
            $eredmeny = $eredmenySzovegek[$login];
        }

        if(!(isset($SESSION['id']))){
            echo ('<form method ="post" action = "belepes.php">
            Felhasználónév: <input type="text" name="felhnev" placeholder="írd be a felhasználó neved" required="required"> <br>
            Jelszó: <input type="password" name="jelszo" required="required"><br>
            <input type = "submit" value="Belépés">
            <p> <?php if(isset($_POST)) echo $eredmeny; ?> </p>
            </form>');
        }

        ?>

    <title>Belépés</title>
</head>
<body>
    <?php
    echo("<a href=\"index.php\"><img src=letöltés.png></a>");
    ?>
</body>
</html>