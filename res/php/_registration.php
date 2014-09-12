<?php
	include(dirname(__FILE__)."/_checkDataBase.php");
	include(dirname(__FILE__)."/_loadLangFiles.php");
	include(dirname(__FILE__)."/_getVersionScript.php");
	include(dirname(__FILE__)."/_buttonScript.php");

	$abfrage = "SELECT * FROM `registrierung`";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);

	$host = $_SERVER['SERVER_NAME'];

	//Zum Plan
	Button("plan", "mlkvplan/mlkvplan.php");

	if ($row->aktiviert != 'true')
		header("Location: http://$host/mlkvplan/modulDisabled.php"); 
?>