<?php 
	include(dirname(__FILE__)."/_checkDataBase.php");
	include(dirname(__FILE__)."/_getVersionScript.php");
	
	$host = $_SERVER['SERVER_NAME'];
	$ID2 = "ID2=d24a5dd7-48c6-4b27-8f79-464a62af12bf";
	$http = "https://light.dsbcontrol.de/DSBlightWebsite/(S(wns2f3dhy5w21zzxuzomq1ph))/Homepage/PreProgram.aspx?";

	$abfrage = "SELECT * FROM `datum`";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);

// Check Version
    if(isset($_GET['do']) && $_GET['do'] == "html")
    {
      $path_modul1 = "http://$host/mlkvplan/res/upload/modul1.html";
      $path_modul2 = "http://$host/mlkvplan/res/upload/modul2.html";
      $version_sup = "html";
    }
    else
    {
      $path_modul1 = $http."ID=a290d4b8-79f8-4afe-a676-d15b75233151&".$ID2;
      $path_modul2 = $http."ID=9de26a53-1a27-40ed-9ee1-82b65a6bcb38&".$ID2;
      $version_sup = "flash";
    }

    function CheckDatum($row, $modul)
    {
      include(dirname(__FILE__)."/_loadLangFiles.php");

      if (isset($_GET['do']) && $_GET['do'] == "html")
      {
        if(strtotime($row) != strtotime(date("d/m/y")))
          return "<span style ='color:#B40404;'>".$string['mlkvplan'][$modul.'.nicht.aktuell']."</span> <h4>(".$string['mlkvplan']['letztes.update'].$row.")"."</h4>";
        else
          return "<span style ='color:#007236;'>".$string['mlkvplan'][$modul.'.aktuell']."</span> <h4>(".$string['mlkvplan']['letztes.update'].$row.")"."</h4>";
      }
      else
        return "";
    }
?>