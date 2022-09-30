<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablr.css">
	<?php

	// phpteszter jelszava: HfblLxoQi75hdL1d

		$servername = "localhost";
		$username = "phpteszter";
		$password = "HfblLxoQi75hdL1d";
		$dbname = "phpteszt";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
	
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		//echo "Connected successfully";

		$osztaly = 1;

		if(isset($_GET['osztalyId'])) {
			$osztaly = $_GET['osztalyId'];
		}
		$osztalyok = array();

		
		$sql = "SELECT osztalyId, osztalyNev FROM osztalyok";
		$result = $conn->query($sql);

			if($result->num_rows > 0){
				while($row = $result ->fetch_assoc())
					//print_r($row). "<br>";
					$osztalyok[$row['osztalyId']] = $row['osztalyNev'];
			}	
			else{
				echo "0 results";
			}


			//$kulcsok = array_keys($osztalyok);

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
			$result = $conn->query($sql);
			if($result ->num_rows > 0){
				$row = $result->fetch_assoc();
				print_r($row);
				$osztaly = $row['osztalyId'];
			}
		}
			// SELECT osztalyId FROM `szemelyek` INNER JOIN sorok ON (szemelyek.szemelyId = sorok.nev1 OR szemelyek.szemelyId = sorok.nev2 OR szemelyek.szemelyId = sorok.nev3 OR szemelyek.szemelyId = sorok.nev4 OR szemelyek.szemelyId = sorok.nev5) WHERE nev LIKE 'Tóth Kristóf';

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
			$result = $conn->query($sql);

				if($result->num_rows > 0){
					echo '<table>';
					while($row = $result->fetch_assoc()){
				//print_r($row). "<br>";
				//$osztalyok[$row['osztalyId']] = $row['osztalyNev'];
					echo "<tr>";
					for($i=1; $i<6; $i++){
						$nev = "_";
						$mezoNev = 'nev'.$i;
						if($row[$mezoNev] != null ){
							$sql = "SELECT nev FROM	szemelyek WHERE szemelyId = ".$row[$mezoNev];
							$result2 = $conn->query($sql);
							if($result->num_rows > 0){
								$szemelySor = $result2->fetch_assoc();
								$nev = $szemelySor['nev']; 
							}
						}						
						if($row['sorId'] == $sajatMagam ['sorId'] and $sajatMagam['mezoNeve'] == $mezoNev){
							echo "<td style=\"background-color:rgb(105, 219, 105);\">".$nev."</td>\n";
						} else {
							echo "<td>".$nev."</td>\n";
						}
							
				}
					echo "</tr>";
				}
				echo'</table>';
				}					
			else{
				echo "Nincsenek tanulók eben az osztályban";
			}			
		//else echo "<h3>Nincs ilyen osztály: $osztaly</h3>";
			$conn->close();
		?>
</body>
</html>