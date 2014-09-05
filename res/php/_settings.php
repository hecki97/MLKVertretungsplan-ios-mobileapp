<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);

	include("$root/mlkvplan/res/php/_auth.php");
	include("$root/mlkvplan/res/php/_loadLangFiles.php");
	include("$root/mlkvplan/res/php/_checkDataBase.php");
	include("$root/mlkvplan/res/php/_getVersionScript.php");
	include("$root/mlkvplan/res/php/_buttonScript.php");

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
		$echo_registrierung = "aktiviert";
	else
		$echo_registrierung = "deaktiviert";

// Zum Online Editor
	Button("fback", "mlkvplan/onlineEditor.php");
?>