<?php
	include(dirname(__FILE__)."../../../../res/php/_getVersionScript.php");
	include(dirname(__FILE__)."../../../../res/php/_loadLangFiles.php");
	include(dirname(__FILE__)."../../../../res/php/_checkDataBase.php");
	include(dirname(__FILE__)."/_session.php");

	$abfrage = "SELECT * FROM `datum`";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);	

	if($_SESSION["version"] == "html")
    {
		if(!empty($row->modul1))
		{
		    if(strtotime($row->modul1) != strtotime(date("d/m/y")))
		    {
		       	$modul1_bg = "bg-darkRed";
		       	$modul1_tileStatus = $string['labels']['l.last.update'].$row->modul1;
		    }
		    else
		    {
		       	$modul1_bg = "bg-green";
		        $modul1_tileStatus = $string['labels']['l.modul1'];
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
		$modul1_tileStatus = $string['labels']['l.modul1'];
	}

	if($_SESSION["version"] == "html")
    {
		if(!empty($row->modul2))
		{
		    if(strtotime($row->modul2) != strtotime(date("d/m/y")))
		    {
		       	$modul2_bg = "bg-darkRed";
		       	$modul2_tileStatus = $string['labels']['l.last.update'].$row->modul2;
		    }
		    else
		    {
		       	$modul2_bg = "bg-green";
		       	$modul2_tileStatus = $string['labels']['l.modul2'];
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
		$modul2_tileStatus = $string['labels']['l.modul2'];
	}
?>