<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);

	@$verbindung = mysql_connect("localhost", "login" , "") or die("Verbindung zur Datenbank konnte nicht hergestellt werden"); 
	@mysql_select_db("mlkvplan", $verbindung) or die ("Datenbank konnte nicht ausgewählt werden");

	$key = md5("000");

	$result = mysql_query("SELECT * FROM `key`", $verbindung);
	$num_rows = mysql_num_rows($result);

	if ($num_rows == 0)
	{
		$eintrag = "INSERT INTO `key` (md5) VALUES ('$key')";
	    $eintragen = mysql_query($eintrag);
	}

	$result = mysql_query("SELECT * FROM `registrierung`", $verbindung);
	$num_rows = mysql_num_rows($result);

	if ($num_rows == 0)
	{
		$eintrag = "INSERT INTO registrierung (aktiviert) VALUES ('true')";
        $eintragen = mysql_query($eintrag);
	}

	$result = mysql_query("SELECT * FROM `datum`", $verbindung);
	$num_rows = mysql_num_rows($result);

	if ($num_rows == 0)
	{
		$eintrag = "INSERT INTO `datum` (modul1, modul2) VALUES ('???', '???')";
	    $eintragen = mysql_query($eintrag);
	}
?>