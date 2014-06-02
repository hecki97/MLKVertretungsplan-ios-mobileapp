<?php
     session_start();

     $hostname = $_SERVER['HTTP_HOST'];
     $path = dirname($_SERVER['PHP_SELF']);

    if(!isset($_SESSION["username"])) 
   { 
        header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/authFailed.php');
        exit; 
   } 
?>