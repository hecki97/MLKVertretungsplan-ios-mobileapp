<?php
	include('./_auth.php');
	include('./_getVersionScript.php');
	include('./_fileChecker.php');
	include('./_buttonScript.php');

	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);
	$mlkvplan_array_key = DecodeJSONToArray($key_config);

// Uploader
	forwardButton($hostname, $path, "fupload", "uploader.php");

// Settings
	forwardButton($hostname, $path, "fsettings", "settings.php");
?>