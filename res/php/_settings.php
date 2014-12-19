<?php
	include(dirname(__FILE__)."/_auth.php");
	include(dirname(__FILE__)."/_loadLangFiles.php");
	include(dirname(__FILE__)."/_checkDataBase.php");
	include(dirname(__FILE__)."/_getVersionScript.php");
	
	$row = LoadFromDB($db['t.registration'], true);

//Generiert einen neuen key
	if(isset($_REQUEST["random"]))
	{
	    $gen_key = substr(uniqid(), 0, -1);
	    $key = md5($gen_key);
        $eintragen = mysql_query("UPDATE `".$db['t.key']."` SET md5 = '$key' WHERE 1");
	}

	if($row->aktiviert == "true")
		$echo_registrierung = $string['labels']['l.activated'];
	else
		$echo_registrierung = $string['labels']['l.deactivated'];

	if(isset($_REQUEST['auswahl']))
	{
		if(@$_POST['check'] == "True")
            $eintragen = mysql_query("UPDATE `".$db['t.registration']."` SET aktiviert = 'true' WHERE 1");
		if(@$_POST['check'] == "False")
            $eintragen = mysql_query("UPDATE `".$db['t.registration']."` SET aktiviert = 'false' WHERE 1");

        ?><script type="text/javascript">
		window.onload = function()
		{
			if (!window.location.search)
				setTimeout("window.location+='?refreshed';", .1000);
		}
		</script><?php
    }
?>