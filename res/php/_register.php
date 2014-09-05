<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);

	include("$root/mlkvplan/res/php/_checkDataBase.php");
	include("$root/mlkvplan/res/php/_loadLangFiles.php");
	include("$root/mlkvplan/res/php/_getVersionScript.php");
	include("$root/mlkvplan/res/php/_buttonScript.php");

	$abfrage = "SELECT * FROM `registrierung`";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);

	$host = $_SERVER['SERVER_NAME'];

	//Zum Plan
	Button("plan", "mlkvplan/mlkVPlan.php");

	if ($row->aktiviert != 'true')
		header("Location: http://$host/mlkvplan/modulDisabled.php"); 
?>