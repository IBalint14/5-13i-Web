<?php
session_start();

$eredmeny = "";

if(isset($_GET['kilepes'])){
    session_unset();
    $eredmeny = "Sikeres kilépés";
}

?>
    <?php
        require 'db.inc.php';
        $db= new DataBase();

        require 'model/Szemely.php';
        $szemely = new Szemely($db);
        require 'model/osztaly.php';


        $eredmény = "";

        $action = "";

        if (isset($_REQUEST['action'] ?? "";


        switch ($_REQUEST['action']){
            case 'kilepes':
                $eredmeny = "Sikeres kilépés"
            break;

            case 'belepes':
                if(isset($_POST['felhasznalonev']) && isset($_POST['jelszo'])){
                    $login = $szemely-> checkLogin($_POST['felhasznalonev'],$_POST['jelszo']);
                    $eredmeny = $eredmenySzovegek[$login];
            }
            break;

            case 'feltoltes':

            break;


        }



        $eredmenySzovegek = array(
            "Nincs ilyen felhasználónév",
            "Sikertelen belépés: hibás jelszó",
            "Sikeres belépés"
        );

        if(isset($_POST['felhasznalonev']) && isset($_POST['jelszo'])){
            $login = $szemely-> checkLogin($_POST['felhasznalonev'],$_POST['jelszo']);
            $eredmeny = $eredmenySzovegek[$login];
        }

        $targer_dir = "uploads/"
        $targer_file = $targer_dir . $_SESSION['id'].".jpg";

        if(move_iploaded_file($_FILES["profilkep"]))



        require 'view/belepes.php';
    ?>