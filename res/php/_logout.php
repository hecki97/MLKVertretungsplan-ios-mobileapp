<?php
     session_start();
     session_destroy();

     $host = $_SERVER['SERVER_NAME'];
     header("Location: http://$host/mlkvplan/index.php");
?>