<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);

	include("$root/mlkvplan/res/php/_checkDataBase.php");
	include("$root/mlkvplan/res/php/_loadLangFiles.php");
	include("$root/mlkvplan/res/php/_getVersionScript.php");
	include("$root/mlkvplan/res/php/_buttonScript.php");

	$host = $_SERVER['SERVER_NAME'];

	//Registrieren
	Button("register", "mlkvplan/register.php");
	//Zum Plan
	Button("fback", "mlkvplan/mlkVPlan.php");

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
	        header("Location: http://$host/mlkvplan/onlineEditor.php");
	      } 
	      else 
	      { 
	        ?><script type="text/javascript">alert("<?php echo $string['global']['javascript.alert.login.failed']; ?>");</script><?php
	      }
	    }
	    else
	    {
	      ?><script type="text/javascript">alert("<?php echo $string['global']['javascript.alert.felder']; ?>");</script><?php
	    }
	}
?>