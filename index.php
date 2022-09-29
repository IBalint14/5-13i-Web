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

		if(isset($_GET['osztalyNeve'])) {
			$osztaly = $_GET['osztalyNeve'];
		}
		$osztalyok = array();

	
		$sajatMagam = array('osztaly'=> "13 i",'sorom' => 2, 'oszlopom' => 2);
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

	?>
		 <title><?php echo "$osztalyok[$osztaly]" ?></title>
</head>
<body>
	<?php

		echo "<h1>$osztalyok[$osztaly]</h1>";
					
		foreach($osztalyok as $kulcs => $ertek){
				if($kulcs != $osztaly){		
					echo "<a href = \"index.php?osztalyNeve=$kulcs\"> $ertek </a><br>";			
				}
			
		}
		
	?>
    <table >

		<?php

			$sql = "SELECT nev1, nev2, nev3, nev4, nev5 FROM sorok WHERE osztalyId = ".$osztaly;
			$result = $conn->query($sql);

				if($result->num_rows > 0){
					echo '<table>';
					while($row = $result->fetch_assoc()){
						//print_r($row). "<br>";
						//$osztalyok[$row['osztalyId']] = $row['osztalyNev'];
						echo "<tr>";
						echo "<td>".$row['nev1']."</td>\n";
						echo "<td>".$row['nev2']."</td>\n";
						echo "<td>".$row['nev3']."</td>\n";
						echo "<td>".$row['nev4']."</td>\n";
						echo "<td>".$row['nev5']."</td>\n";
						echo "</tr>";
					}
					echo'</table>';
				}					
				else{
					echo "Nincsenek tanulók eben az osztályban";
				}
					//Erre most semmi szükségünk sincs
					if($osztaly == $sajatMagam['osztaly'] and $sor == $sajatMagam['sorom'] and $oszlop == $sajatMagam['oszlopom']) {
						echo "<td class = 'magam'>$tanulo</td>";
		}					
			//else echo "<h3>Nincs ilyen osztály: $osztaly</h3>";
			$conn->close();
		?>
</body>
</html>