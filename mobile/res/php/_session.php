<?php
    session_start();
    $host = $_SERVER['SERVER_NAME'];

    function checkVersion()
	{
		if ($_SESSION["version"] == "html")
			return "html";
		else
			return "flash";
	}

    if(!isset($_SESSION["version"])) 
    { 
        $_SESSION["version"] = "html";
        exit;
    } 
?>