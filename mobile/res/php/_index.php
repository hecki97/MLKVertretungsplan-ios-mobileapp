<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include("$root/mlkvplan/res/php/_getVersionScript.php");
	include("$root/mlkvplan/res/php/_loadLangFiles.php");
	include("$root/mlkvplan/res/php/_checkDataBase.php");

	$abfrage = "SELECT * FROM `datum`";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);

	if($_COOKIE["mobile_version"] == "html")
    {
		if(!empty($row->modul1))
		{
		    if(strtotime($row->modul1) != strtotime(date("d/m/y")))
		    {
		       	$modul1_bg = "bg-darkRed";
		       	$modul1_tileStatus = $string['mlkvplan']['letztes.update'].$row->modul1;
		    }
		    else
		    {
		       	$modul1_bg = "bg-green";
		       	$modul1_tileStatus = "Modul1";
		    }
		}
		else
		{
		    $modul1_bg = "bg-gray";
		    $modul1_tileStatus = "???";
		}
	}
	else
	{
		$modul1_bg = "bg-gray";
		$modul1_tileStatus = $string['mlkvplan']['modul1.flash'];
	}

	if($_COOKIE["mobile_version"] == "html")
    {
		if(!empty($row->modul2))
		{
		    if(strtotime($row->modul2) != strtotime(date("d/m/y")))
		    {
		       	$modul2_bg = "bg-darkRed";
		       	$modul2_tileStatus = $string['mlkvplan']['letztes.update'].$row->modul2;
		    }
		    else
		    {
		       	$modul2_bg = "bg-green";
		       	$modul2_tileStatus = "Modul2";
		    }
		}
		else
		{
		    $modul2_bg = "bg-gray";
		    $modul2_tileStatus = "???";
		}
	}
	else
	{
		$modul2_bg = "bg-gray";
		$modul2_tileStatus = $string['mlkvplan']['modul2.flash'];
	}
?>