<?php
	include(dirname(__FILE__)."/_auth.php");
	include(dirname(__FILE__)."/_loadLangFiles.php");
	include(dirname(__FILE__)."/_checkDataBase.php");
	include(dirname(__FILE__)."/_getVersionScript.php");
	include(dirname(__FILE__)."/_buttonScript.php");
	
	$abfrage = "SELECT * FROM `registrierung`";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);

//Generiert einen neuen key
	if(isset($_REQUEST["random"]))
	{
	    $randKey = uniqid();
	    $gen_key = substr($randKey, 0, -1);
	    $key = md5($gen_key);
        $eintragen = mysql_query("UPDATE `key` SET md5 = '$key' WHERE 1");
	}

	if($row->aktiviert == "true")
		$echo_registrierung = $string['labels']['l.activated'];
	else
		$echo_registrierung = $string['labels']['l.deactivated'];

	if(isset($_REQUEST['auswahl']))
	{
		if(@$_POST['check'] == "True")
            $eintragen = mysql_query("UPDATE `registrierung` SET aktiviert = 'true' WHERE 1");
		if(@$_POST['check'] == "False")
            $eintragen = mysql_query("UPDATE `registrierung` SET aktiviert = 'false' WHERE 1");

        ?><script type="text/javascript">
		window.onload = function()
		{
			if (!window.location.search)
				setTimeout("window.location+='?refreshed';", .1000);
		}
		</script><?php
    }
?>