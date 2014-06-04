<?php
	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);

	setcookie("mobile_version", "", time()-3600);
    header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/mobile_cookie.php');
?>