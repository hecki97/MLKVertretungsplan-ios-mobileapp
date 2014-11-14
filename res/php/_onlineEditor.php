<?php
	include(dirname(__FILE__)."/_auth.php");
	include(dirname(__FILE__)."/_checkDataBase.php");
	include(dirname(__FILE__)."/_loadLangFiles.php");
	include(dirname(__FILE__)."/_getVersionScript.php");

	$abfrage = "SELECT * FROM `key`";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);
?>