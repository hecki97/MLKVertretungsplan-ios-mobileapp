<?php
     session_start();
     session_destroy();

     $hostname = $_SERVER['HTTP_HOST'];
     $path = dirname($_SERVER['PHP_SELF']);

     if(!file_exists("data"))
		mkdir("data");

     $datei = 'data/usrTMP.dat';
     if (file_exists($datei))
     	unlink($datei);

     header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');
?>