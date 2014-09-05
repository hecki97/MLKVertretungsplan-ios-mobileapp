<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include("$root/mlkvplan/res/php/_getVersionScript.php");
	//include('../_arrayToJSONScript.php');
	//$date_config = "../config/date.config";

	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);
	//$mlkvplan_array_modul = DecodeJSONToArray($date_config);

	if($_COOKIE["mobile_version"] == "html")
    {
		if(!empty($mlkvplan_array_modul->Datum_Modul1))
		{
		    if(strtotime($mlkvplan_array_modul->Datum_Modul1) != strtotime(date("d/m/y")))
		    {
		       	$modul1_bg = "bg-darkRed";
		       	$modul1_tileStatus = "Letztes Update: ".$mlkvplan_array_modul->Datum_Modul1;
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
		$modul1_tileStatus = "Modul1 ist immer aktuell!";
	}

	if($_COOKIE["mobile_version"] == "html")
    {
		if(!empty($mlkvplan_array_modul->Datum_Modul2))
		{
		    if(strtotime($mlkvplan_array_modul->Datum_Modul2) != strtotime(date("d/m/y")))
		    {
		       	$modul2_bg = "bg-darkRed";
		       	$modul2_tileStatus = "Letztes Update: ".$mlkvplan_array_modul->Datum_Modul2;
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
		$modul2_tileStatus = "Modul2 ist immer aktuell!";
	}
?>