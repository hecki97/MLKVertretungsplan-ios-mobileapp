<?php
	include('../_getVersionScript.php');
	include('../_buttonScript.php');
	
	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);

// Zur Auswahl
	forwardButton($hostname, $path, "mobileCookie", "_mobile_destroyCookie.php");

?>