<?php
	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);

	setcookie("vPlan_version", "", time()-3600);
    header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');
?>