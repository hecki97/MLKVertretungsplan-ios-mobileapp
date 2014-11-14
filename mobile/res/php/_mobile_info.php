<?php
	$host = $_SERVER['SERVER_NAME'];
	include(dirname(__FILE__)."../../../../res/php/_getVersionScript.php");
	include(dirname(__FILE__)."../../../../res/php/_loadLangFiles.php");
	include(dirname(__FILE__)."/_session.php");

	if(isset($_REQUEST['flash']))
	{
		$_SESSION["version"] = "flash";
		header("Location: http://$host/mlkvplan/mobile/index.php");
	}

	if(isset($_REQUEST['html']))
	{
		$_SESSION["version"] = "html";
		header("Location: http://$host/mlkvplan/mobile/index.php");
	}

?>