<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include("$root/mlkvplan/res/php/_getVersionScript.php");
	include("$root/mlkvplan/res/php/_loadLangFiles.php");
	
	if (isset($_REQUEST["destroyCookie"]))
	{
		setcookie("mobile_version", "", time()-3600);
		?><script type="text/javascript">window.location.reload();</script><?php
	}
?>