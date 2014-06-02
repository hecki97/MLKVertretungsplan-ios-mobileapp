<?php
	include('./_auth.php');
	include('./_getVersionScript.php');
	include('./_buttonScript.php');
	include_once('./_arrayToJSONScript.php');

	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);
	$settings_config = "./config/settings.config";
	$mlkvplan_array_settings = DecodeJSONToArray($settings_config);

// Zum Online Editor
	forwardButton($hostname, $path, "fback", "onlineEditor.php");
?>