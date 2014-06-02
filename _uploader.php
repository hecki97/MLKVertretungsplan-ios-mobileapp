<?php
	include('./_auth.php');
	include('./_getVersionScript.php');
	include('./_fileChecker.php');
	include('./_buttonScript.php');
	
	$hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

	//Zum OnlineEditor
	forwardButton($hostname, $path, "fback", "onlineEditor.php");

	$mlkvplan_array_modul1 = DecodeJSONToArray($date_config);
	$mlkvplan_array_modul2 = DecodeJSONToArray($date_config);
?>