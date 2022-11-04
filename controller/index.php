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
	$sajatMagam = array('osztaly' => "13 i",'sorom' )