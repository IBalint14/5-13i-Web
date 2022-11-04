<?php
	session_start();

	require 'model/szemely.php';
	require 'model/osztaly.php';

	$szemely = new Szemely($db);
	$osztaly = 1;


	if(isset($_REQUEST['osztalyId'])){
		$osztaly = $_REQUEST['osztalyId'];
	}

	if(isset($_GET['szemelyId'])){
		if($szemelyOsztalya = $szemely->getOsztaly($_GET['szemelyId'])){
			$osztaly = $szemelyOsztalya;
		}
	}

	$osztalyPeldany = new Osztaly($db, $osztaly);
	$osztalyok = $osztakyPeldany->gatAll($db);
	$sajatMagam = array('osztaly' => "13 i",'sorom' => 2, 'oszlopom' =>2 );
		if(!array_key_exists($osztaly, $osztalyok)){
			$osztaly = 1;
		}

?>

		<title><?php echo "$osztalyok[$osztaly]"?></title>

<body>

<?php

		$szemely = new Szemely($db);
	$sajatMagam = array('szemelyId' => 31, 'mezoNeve' => 'nev3');

	$sql = "SELECT nev1, nev2, nev3, nev4, nev5, szemelyId FROM sorok WHERE osztalyId = ".$osztaly;
	$result = $dbSelect($sql);
	require './view/index.php';
?>



