<?php
	include(dirname(__FILE__)."../../../../res/php/_getVersionScript.php");
	include(dirname(__FILE__)."../../../../res/php/_loadLangFiles.php");
	
	if (isset($_REQUEST["destroyCookie"]))
	{
		setcookie("mobile_version", "", time()-3600);
		?><script type="text/javascript">window.location.reload();</script><?php
	}
?>