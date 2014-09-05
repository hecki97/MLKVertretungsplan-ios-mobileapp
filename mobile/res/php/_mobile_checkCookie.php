<?php
	$host = $_SERVER['SERVER_NAME'];

	// Check Cookie
	if(!isset($_COOKIE["mobile_version"]))
		header("Location: http://$host/mlkvplan/mobile/mobile_cookie.php");

	if($_COOKIE["mobile_version"] == "flash")
        $version_sup = "flash";
   	else
    	$version_sup = "html";
?>