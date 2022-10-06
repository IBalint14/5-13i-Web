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

	print "A post tartamla: ";
	print_r($_POST);
	if(isset($_POST['keresettNev'])){
		echo $sql = "SELECT osztalyId FROM szemelyek INNER JOIN sorok 
		ON (szemelyek.szemelyId = sorok.nev1 
			OR szemelyek.szemelyId = sorok.nev2
			OR szemelyek.szemelyId = sorok.nev3 
			OR szemelyek.szemelyId = sorok.nev4 
			OR szemelyek.szemelyId = sorok.nev5) 
		WHERE nev LIKE '".$_POST['keresettNev']."%';";
		
		if($result = $db->dbSelect($sql)){
			$row = $result->fetch_assoc();
			print_r($row);
			$osztaly = $row['osztalyId'];
		}
		}			
		echo "<h1>$osztalyok[$osztaly]</h1>";
		?>
		<form method="post" action="index.php">
			<input type="text" name="keresettNev">
			<input type="submit" value="KERES">
		</form>	
	<?php	
		foreach($osztalyok as $kulcs => $ertek){
				if($kulcs != $osztaly){
					echo "<a href = \"index.php?osztalyId=$kulcs\"> $ertek </a><br>";			
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
							$szemely = new Szemely($row[$mezoNev], $db);
							$nev = $szemely->getNev();
							}												
						if($row['sorId'] == $sajatMagam ['sorId'] and $sajatMagam['mezoNeve'] == $mezoNev){
							echo "<td style=\"background-color:rgb(105, 219, 105);\">".$nev."</td>\n";
						}
						 else 
							echo "<td>".$nev."</td>\n";		
			}
					echo "</tr>";
		}
				echo'</table>';		
	}	
			else{
				echo "Nincsenek tanulók eben az osztályban";
			}			
			
		?>
</body>
</html>