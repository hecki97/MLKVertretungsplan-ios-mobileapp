<?php
	$host = $_SERVER['SERVER_NAME'];

	if(!isset($_COOKIE["mobile_version"]))
    {
        if(isset($_POST['auswahl']))
        {
            if($_POST['check'] == "html")
            {
                setcookie("mobile_version", "html");
                header("Location: http://$host/mlkvplan/mobile/index.php");
            }
            elseif($_POST['check'] == "flash")
            {
                setcookie("mobile_version", "flash");
                header("Location: http://$host/mlkvplan/mobile/index.php");
            }    
            else
                ?><script type="text/javascript">alert("Bitte eine Auswahl treffen!");</script><?php
        }
    }
    else
        header("Location: http://$host/mlkvplan/mobile/index.php");
?>