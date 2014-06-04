<?php
	// Check Cookie
	if(!isset($_COOKIE["mobile_version"]))
		header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/mobile_cookie.php');

	if($_COOKIE["mobile_version"] == "flash")
        $version_sup = "flash";
   	else
    	$version_sup = "html";
?>