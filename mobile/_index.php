<?php
	include('../_getVersionScript.php');
	include('../_arrayToJSONScript.php');
	$date_config = "../config/date.config";

	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);
	$mlkvplan_array_modul = DecodeJSONToArray($date_config);

	if($_COOKIE["mobile_version"] == "html")
    {
		if(!empty($mlkvplan_array_modul->Datum_Modul1))
		{
		    if(strtotime($mlkvplan_array_modul->Datum_Modul1) != strtotime(date("d/m/y")))
		    {
		       	$modul1_badge = "badge busy";
		       	$modul1_tileStatus = "Letztes Update: ".$mlkvplan_array_modul->Datum_Modul1;
		    }
		    else
		    {
		       	$modul1_badge = "badge available";
		       	$modul1_tileStatus = "Modul1";
		    }
		}
		else
		{
		    $modul1_badge = "badge attention";
		    $modul1_tileStatus = "???";
		}
	}
	else
	{
		$modul1_badge = "badge unavailable";
		$modul1_tileStatus = "Modul1 ist immer aktuell!";
	}

	if($_COOKIE["mobile_version"] == "html")
    {
		if(!empty($mlkvplan_array_modul->Datum_Modul2))
		{
		    if(strtotime($mlkvplan_array_modul->Datum_Modul2) != strtotime(date("d/m/y")))
		    {
		       	$modul2_badge = "badge busy";
		       	$modul2_tileStatus = "Letztes Update: ".$mlkvplan_array_modul->Datum_Modul2;
		    }
		    else
		    {
		       	$modul2_badge = "badge available";
		       	$modul2_tileStatus = "Modul2";
		    }
		}
		else
		{
		    $modul2_badge = "badge attention";
		    $modul2_tileStatus = "???";
		}
	}
	else
	{
		$modul2_badge = "badge unavailable";
		$modul2_tileStatus = "Modul2 ist immer aktuell!";
	}
?>