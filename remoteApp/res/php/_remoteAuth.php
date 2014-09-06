<?php
    session_start();
	$host = $_SERVER['SERVER_NAME'];

    if(!isset($_SESSION["remoteUsername"])) 
   { 
        header('Location: http://$host/mlkvplan/remoteApp/remoteAuthFailed.php');
        exit; 
   } 
?>