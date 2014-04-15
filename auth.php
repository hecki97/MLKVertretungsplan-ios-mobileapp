<?php
     session_start();

     $hostname = $_SERVER['HTTP_HOST'];
     $path = dirname($_SERVER['PHP_SELF']);

    if (!isset($_SESSION['angemeldet']) || !$_SESSION['angemeldet']) {
    	header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php');

		$datei = 'data/usrTMP.dat';
    	if (file_exists($datei))
     		unlink($datei);

	    exit;
    }
?>