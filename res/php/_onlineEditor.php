<?php
	include(dirname(__FILE__)."/_auth.php");
	include(dirname(__FILE__)."/_checkDataBase.php");
	include(dirname(__FILE__)."/_loadLangFiles.php");
	include(dirname(__FILE__)."/_getVersionScript.php");

	$row = LoadFromDB($db['t.key'], true);
?>