<?php
    session_start();
    $host = $_SERVER['SERVER_NAME'];

    if(!isset($_SESSION["username"])) 
   { 
        header("Location: http://$host/mlkvplan/login.php");
        exit;
   } 
?>