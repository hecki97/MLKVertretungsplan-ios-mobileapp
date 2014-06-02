<?php
	include('./_getVersionScript.php');
	include('./_fileChecker.php');
	include('./_buttonScript.php');
	  
	$verbindung = mysql_connect("localhost", "login" , "") or die("Verbindung zur Datenbank konnte nicht hergestellt werden"); 
	mysql_select_db("test") or die ("Datenbank konnte nicht ausgewählt werden"); 

	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);

	//Registrieren
	forwardButton($hostname, $path, "register", "./register.php");
	//Zum Plan
	forwardButton($hostname, $path, "fback", "./mlkVPlan.php");

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	    if (!empty($_POST["username"]) && !empty($_POST["password"]))
	    {
	      session_start();

	      $username = $_POST["username"]; 
	      $passwort = md5($_POST["password"]); 

	      $abfrage = "SELECT username, passwort FROM login WHERE username LIKE '$username' LIMIT 1"; 
	      $ergebnis = mysql_query($abfrage); 
	      $row = mysql_fetch_object($ergebnis); 

	      if($row->passwort == $passwort) 
	      { 
	        $_SESSION["username"] = $username; 
	        header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/onlineEditor.php');
	      } 
	      else 
	      { 
	        ?><script type="text/javascript">alert(unescape("Bitte Benutzername und/oder Passwort %FCberpr%FCfen!"));</script><?php
	      }
	    }
	    else
	    {
	      ?><script type="text/javascript">alert(unescape("Bitte alle Felder ausf%FCllen!"));</script><?php
	    }
	}
?>