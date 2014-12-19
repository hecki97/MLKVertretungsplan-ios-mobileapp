<?php
	include_once(dirname(__FILE__)."/_loadLangFiles.php");

	$key = md5("000");
	$db = json_decode(file_get_contents(dirname(__FILE__)."/../config/database.config"), true);

	@$verbindung = mysql_connect($db['db.config']['connection'], $db['db.config']['login'] , $db['db.config']['pw']) or die($string['mysql']['m.connect.error']); 
	@mysql_select_db($db['db.config']['database'], $verbindung) or die ($string['mysql']['m.select.db.error']);

	$num_rows = LoadFromDB($db['t.key'], false);
	if ($num_rows == 0)
	{
		$eintrag = "INSERT INTO `".$db['t.key']."` (md5) VALUES ('$key')";
	    $eintragen = mysql_query($eintrag);
	}

	$num_rows = LoadFromDB($db['t.registration'], false);
	if ($num_rows == 0)
	{
		$eintrag = "INSERT INTO `".$db['t.registration']."` (aktiviert) VALUES ('true')";
        $eintragen = mysql_query($eintrag);
	}

	$num_rows = LoadFromDB($db['t.date'], false);
	if ($num_rows == 0)
	{
		$eintrag = "INSERT INTO `".$db['t.date']."` (modul1, modul2) VALUES ('???', '???')";
	    $eintragen = mysql_query($eintrag);
	}

	function LoadFromDB($_db, $_fetch)
	{
		$result = mysql_query("SELECT * FROM `".$_db."`");

		if ($_fetch)
			return mysql_fetch_object($result);
		else
			return mysql_num_rows($result);
	}
?>