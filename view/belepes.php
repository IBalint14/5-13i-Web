<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablr.css">
    <style><?php include 'tablr.css'; ?></style>
       

    <title>Belépés</title>
</head>
<body>
    <?php
            if(isset($_POST['felhasznalonev']) && isset($_POST['jelszo'])){
                switch($login){
                    case 0:
                        echo '<h2 class="errormessage">Nincs ilyen felhasználónév: '.$_POST['felhnev'].'</h2>';
                        break;
                    case 1:
                        echo '<h2 class="errormessage">Sikertelen belépés: Hibás jelszó!</h2>';
                        break;
                    case 2:
                        echo '<h2 class="successmessage">Sikeres bejelentkezés! <br> Helló, '.$_POST['felhnev'].'</h2>';
                        break;
                }
            }
            if(!isset($_SESSION['id'])){
                ?>
                
                <?php
            }
        ?>
        <?php
		if(isset($_session['id'])){
			echo "Üdv ". $_SESSION['nev'];
			echo '<a href= "belepes.php?kilepes=1"> Kilépés<a>';
		}else{
			//echo '<a href= "belepes.php"> Belépés</a>';
		}
	?>
      
      <button> <a href="index.php">vissza</a></button>
   
    </body>
</html>