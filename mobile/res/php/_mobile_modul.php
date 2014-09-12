<?php
	include(dirname(__FILE__)."../../../../res/php/_getVersionScript.php");
	include(dirname(__FILE__)."/_mobile_checkCookie.php");

	$ID2 = "ID2=d24a5dd7-48c6-4b27-8f79-464a62af12bf";
	$http = "https://light.dsbcontrol.de/DSBlightWebsite/(S(wns2f3dhy5w21zzxuzomq1ph))/Homepage/PreProgram.aspx?";

	if(isset($_GET['do']) && $_GET['do'] == "modul1")
	{
		//Check Version Modul1
		if($_COOKIE["mobile_version"] == "html")
	  		$path = "http://$host/mlkvplan/res/upload/modul1.html";
	  	else
	  		$path = $http."ID=a290d4b8-79f8-4afe-a676-d15b75233151&".$ID2;
	}
	else
	{
		//Check Version Modul2
		if($_COOKIE["mobile_version"] == "html")
	  		$path = "http://$host/mlkvplan/res/upload/modul2.html";
	  	else
  			$path = $http."ID=9de26a53-1a27-40ed-9ee1-82b65a6bcb38&".$ID2;
	}
?>