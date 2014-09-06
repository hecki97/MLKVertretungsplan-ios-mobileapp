<?php 
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include("$root/mlkvplan/res/php/_checkDataBase.php");
	include("$root/mlkvplan/res/php/_loadLangFiles.php");
	include("$root/mlkvplan/res/php/_getVersionScript.php");
	
	$host = $_SERVER['SERVER_NAME'];
	$ID2 = "ID2=d24a5dd7-48c6-4b27-8f79-464a62af12bf";
	$http = "https://light.dsbcontrol.de/DSBlightWebsite/(S(wns2f3dhy5w21zzxuzomq1ph))/Homepage/PreProgram.aspx?";

	$abfrage = "SELECT * FROM `datum`";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);

//Check Cookie
	if(!isset($_COOKIE["vPlan_version"]))
		header("Location: http://$host/mlkvplan/index.php");

//Check if Button["destroyCookie"] is activated
	if (isset($_REQUEST["destroyCookie"]))
	{
		setcookie("vPlan_version", "", time()-3600);
		?><script type="text/javascript">window.location.reload();</script><?php
	}

// Check Version
	if($_COOKIE["vPlan_version"] == "html")
  	{
  		$path_modul1 = "http://$host/mlkvplan/res/upload/modul1.html";
  		$path_modul2 = "http://$host/mlkvplan/res/upload/modul2.html";
  	}
  	else
  	{
  		$path_modul1 = $http."ID=a290d4b8-79f8-4afe-a676-d15b75233151&".$ID2;
  		$path_modul2 = $http."ID=9de26a53-1a27-40ed-9ee1-82b65a6bcb38&".$ID2;
  	}
?>