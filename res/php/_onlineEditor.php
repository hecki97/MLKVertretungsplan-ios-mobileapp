<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);

	include("$root/mlkvplan/res/php/_auth.php");
	include("$root/mlkvplan/res/php/_checkDataBase.php");
	include("$root/mlkvplan/res/php/_loadLangFiles.php");
	include("$root/mlkvplan/res/php/_getVersionScript.php");
	include("$root/mlkvplan/res/php/_buttonScript.php");

	$abfrage = "SELECT * FROM `key`";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);

	$host = $_SERVER['SERVER_NAME'];

// Uploader
	Button("fupload", "mlkvplan/upload.php");

// Settings
	Button("fsettings", "mlkvplan/settings.php");
?>