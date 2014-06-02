<?php
	include('./_auth.php');
	include('./_getVersionScript.php');
	include('./_fileChecker.php');
	include('./_buttonScript.php');
	    
	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);

	//Upload
	forwardButton($hostname, $path, "fback", "settings.php");

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	  if(isset($_REQUEST["uarandom"]))
	  {
	    $randKey = uniqid();
	    $key = substr($randKey, 0, -1);
	    $array['Key'] = md5($key);
	    EncodeArrayToJSON($key_config, $array);
	  }
	}
?>