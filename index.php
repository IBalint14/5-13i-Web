<?php
session_start();
?>
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



	$osztaly = 1;

	if(isset($_GET['osztalyId'])) {
		$osztaly = $_GET['osztalyId'];
	}

	//szemelyId=34
	//melyik osztályban van?
	if(isset($_GET['szemelyId'])){
		if($szemelyOsztalya = $szemely->getOsztaly($_GET['szemelyId'])){
				$osztaly = $szemelyOsztalya;
			}
		}


	$osztalyPeldany = new Osztaly($osztaly, $db);

	$osztalyok = $osztalyPeldany->getAll($db);

	if(!array_key_exists($osztaly, $osztalyok)){
		$osztaly = 1;
		}
	?>
	<title><?php echo "$osztalyok[$osztaly]" ?></title>
</head>
<body>

	<?php
		if(isset($_session['id'])){
			echo "Üdv ". $_SESSION['nev'];
			echo '<a href= "belepes.php?kilepes=1"> Kilépés<a>';
		}else{
			echo '<a href= "belepes.php"> Belépés</a>';
		}
	?>

	<?php			
		echo "<h1>$osztalyok[$osztaly]</h1>";
		?>
		<form method="post" action="lista.php">
			<input type="text" name="keresettNev">
			<input type="submit" value="KERES">
		</form>	
	<?php	
		foreach($osztalyok as $kulcs => $ertek){
				if($kulcs != $osztaly){
					echo "<h1><a href = \"index.php?osztalyId=$kulcs\"> $ertek </a></h1><br>";			
				}
		}		
	?>
    <table >

		<?php
			$sajatMagam = array('sorId'=> 7, 'mezoNeve' => 'nev3');

			$sql = "SELECT sorId, nev1, nev2, nev3, nev4, nev5 FROM sorok WHERE osztalyId = ".$osztaly;

				if($result = $db->dbSelect($sql)){
					echo '<table>';
					while($row = $result->fetch_assoc()){
					echo "<tr>";
					for($i=1; $i<6; $i++){
						$nev = "_";
						$mezoNev = 'nev'.$i;
						if($row[$mezoNev] != null ){
							$nev = $szemely->getNev($row[$mezoNev], $db);
							}	
							$bg = "";	
						if(isset($_GET['szemelyId'])){
								if($_GET['szemelyId'] == $row[$mezoNev])
								$bg = "background-color:rgb(108, 167, 255);";

							}										
						if($row['sorId'] == $sajatMagam ['sorId'] and $sajatMagam['mezoNeve'] == $mezoNev){
							echo "<td style=\"background-color:rgb(105, 219, 105);$bg\">".$nev."</td>\n";
							}
						 else 
							echo "<td style=\"$bg\">".$nev."</td>\n";		
			}
					echo "</tr>";
		}
				echo'</table>';		
	}	
			else{
				echo "Nincsenek tanulók eben az osztályban";
			}			
			
		?>

	<hr>
	<div>
		<a href="belepes.php">Belépés</a>
	</div>

	<form action="upload.php" method="post" enctype="multipart/form-data">
			A kiválasztott kép:
  	<input type="file" name="fileToUpload" id="fileToUpload">
  	<input type="submit" value="Feltöltés" name="submit">
	</form>
	
	<button> <a href="upload.php">Képek</a></button>
	
</body>
</html>