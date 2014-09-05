<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include("$root/mlkvplan/res/php/_loadLangFiles.php");
	include("$root/mlkvplan/res/php/_getVersionScript.php");

	$verbindung = mysql_connect("localhost", "login" , "") or die("Verbindung zur Datenbank konnte nicht hergestellt werden"); 
	mysql_select_db("mlkvplan") or die ("Datenbank konnte nicht ausgewählt werden");

	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);

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
	        $_SESSION["remoteUsername"] = $username; 
	        header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/remoteUpload.php');
	      } 
	      else 
	      { 
	        ?><script type="text/javascript">alert("<?php echo $string['remoteApp']['login']['alert.login.failed']; ?>");</script><?php
	      }
	    }
	    else
	    {
	      ?><script type="text/javascript">alert("<?php echo $string['remoteApp']['login']['alert.felder']; ?>");</script><?php
	    }
	}
?>