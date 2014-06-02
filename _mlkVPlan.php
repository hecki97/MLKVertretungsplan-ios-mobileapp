<?php 
	include('./_getVersionScript.php');
	include('./_fileChecker.php');
	include('./_buttonScript.php');
	
	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);
	$mlkvplan_array_modul = DecodeJSONToArray($date_config);

// Check Cookie
	if(!isset($_COOKIE["vPlan_version"]))
		header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');

// Zur Auswahl
	forwardButton($hostname, $path, "destroyCookie", "_destroyCookie.php");

// Check Version
	if($_COOKIE["vPlan_version"] == "html")
  	{
  		$path_modul1 = '"html/modul1.html"';
  		$path_modul2 = '"html/modul2.html"';
  	}
  	else
  	{
  		$path_modul1 = '"https://light.dsbcontrol.de/DSBlightWebsite/(S(wns2f3dhy5w21zzxuzomq1ph))/Homepage/PreProgram.aspx?ID=a290d4b8-79f8-4afe-a676-d15b75233151&ID2=d24a5dd7-48c6-4b27-8f79-464a62af12bf"';
  		$path_modul2 = '"https://light.dsbcontrol.de/DSBlightWebsite/(S(wns2f3dhy5w21zzxuzomq1ph))/Homepage/PreProgram.aspx?ID=9de26a53-1a27-40ed-9ee1-82b65a6bcb38&ID2=d24a5dd7-48c6-4b27-8f79-464a62af12bf"';
  	}
?>