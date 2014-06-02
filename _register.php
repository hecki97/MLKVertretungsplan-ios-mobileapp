<?php
	include('./_getVersionScript.php');
	include('./_fileChecker.php');
	include('./_buttonScript.php');

	$verbindung = mysql_connect("localhost", "login" , "") or die("Verbindung zur Datenbank konnte nicht hergestellt werden"); 
	mysql_select_db("test") or die ("Datenbank konnte nicht ausgewählt werden"); 
  
	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);

	//Zum Plan
	forwardButton($hostname, $path, $buttonName = "plan", $fileName = "/mlkVPlan.php");

	$mlkvplan_array_settings = DecodeJSONToArray($settings_config);
	if (!empty($mlkvplan_array_settings->Registrierung_aktiviert) && $mlkvplan_array_settings->Registrierung_aktiviert == "Deaktiviert")
		header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/modulDisabled.php'); 
?>