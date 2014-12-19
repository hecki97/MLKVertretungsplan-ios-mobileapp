<?php 
	include(dirname(__FILE__)."/_loadLangFiles.php");
  include(dirname(__FILE__)."/_checkDataBase.php");
	include(dirname(__FILE__)."/_getVersionScript.php");
	
  $row = LoadFromDB($db['t.date'], true);
	$host = $_SERVER['SERVER_NAME'];
	$ID2 = "ID2=d24a5dd7-48c6-4b27-8f79-464a62af12bf";
	$http = "https://light.dsbcontrol.de/DSBlightWebsite/(S(wns2f3dhy5w21zzxuzomq1ph))/Homepage/PreProgram.aspx?";

// Check Version
    if(isset($_GET['do']) && $_GET['do'] == "html")
    {
      $path_modul1 = "http://".$host."/mlkvplan/res/upload/modul1.html";
      $path_modul2 = "http://".$host."/mlkvplan/res/upload/modul2.html";
      $version_sup = "html";
    }
    else
    {
      $path_modul1 = $http."ID=a290d4b8-79f8-4afe-a676-d15b75233151&".$ID2;
      $path_modul2 = $http."ID=9de26a53-1a27-40ed-9ee1-82b65a6bcb38&".$ID2;
      $version_sup = "flash";
    }

    function CheckDatum($case)
    {
      global $row, $string;

      if (isset($_GET['do']) && $_GET['do'] == "html")
      {
         switch ($case) {
          case 'modul1':
          if(strtotime($row->modul1) < strtotime(date("d-m-y")))
            $return = "<h2><span style ='color:#B40404; text-shadow: 2px 2px #000;'>Modul1".$string['labels']['l.modul.not.up.to.date']."</span> </h2><h4>(".$string['labels']['l.last.update'].$row->modul1.")"."</h4>";
          else
            $return = "<h2><span style ='color:#007236;'>Modul1".$string['labels']['l.modul.up.to.date']."</span> </h2><h4>(".$string['labels']['l.last.update'].$row->modul1.")"."</h4>";
          break;
        
          case 'modul2':
           if(strtotime($row->modul2) < strtotime(date("d-m-y")))
            $return = "<h2><span style ='color:#B40404; text-shadow: 2px 2px #000;'>Modul2".$string['labels']['l.modul.not.up.to.date']."</span> </h2><h4>(".$string['labels']['l.last.update'].$row->modul2.")"."</h4>";
          else
            $return = "<h2><span style ='color:#007236;'>Modul2".$string['labels']['l.modul.up.to.date']."</span> </h2><h4>(".$string['labels']['l.last.update'].$row->modul2.")"."</h4>";
          break;
        }
        return $return;
       }
      else
        return "";
    }
?>