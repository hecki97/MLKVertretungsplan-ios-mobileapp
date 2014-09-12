<?php
	include(dirname(__FILE__)."/_auth.php");
	include(dirname(__FILE__)."/_loadLangFiles.php");
	include(dirname(__FILE__)."/_checkDataBase.php");
	include(dirname(__FILE__)."/_getVersionScript.php");
	include(dirname(__FILE__)."/_buttonScript.php");

	$host = $_SERVER['SERVER_NAME'];
	
	$abfrage = "SELECT * FROM `registrierung`";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);

//Generiert einen neuen key
	if(isset($_REQUEST["uarandom"]))
	{
	    $randKey = uniqid();
	    $gen_key = substr($randKey, 0, -1);
	    $key = md5($gen_key);
        $eintragen = mysql_query("UPDATE `key` SET md5 = '$key' WHERE 1");
	}

	if($row->aktiviert == "true")
		$echo_registrierung = $string['einstellungen']['aktiviert'];
	else
		$echo_registrierung = $string['einstellungen']['deaktiviert'];

// Zum Online Editor
	Button("fback", "mlkvplan/onlineEditor.php");
?>