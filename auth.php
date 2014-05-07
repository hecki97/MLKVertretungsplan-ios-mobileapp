<?php
     session_start();

     $hostname = $_SERVER['HTTP_HOST'];
     $path = dirname($_SERVER['PHP_SELF']);

    if(!isset($_SESSION["username"])) 
   { 
       echo "Bitte erst <a href=\"login.html\">einloggen</a>"; 
       exit; 
   } 
?>