<?php
	include(dirname(__FILE__)."/_auth.php");
	include(dirname(__FILE__)."/_checkDataBase.php");
	include(dirname(__FILE__)."/_loadLangFiles.php");
	include(dirname(__FILE__)."/_getVersionScript.php");
	include(dirname(__FILE__)."/_buttonScript.php");

	$abfrage = "SELECT * FROM `key`";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);

	$host = $_SERVER['SERVER_NAME'];

// Uploader
	Button("fupload", "mlkvplan/upload.php");

// Settings
	Button("fsettings", "mlkvplan/settings.php");
?>