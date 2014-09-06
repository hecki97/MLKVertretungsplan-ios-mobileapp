<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	$host = $_SERVER['SERVER_NAME'];
	include("$root/mlkvplan/res/php/_loadLangFiles.php");
	include("$root/mlkvplan/res/php/_getVersionScript.php");
	include("$root/mlkvplan/res/php/_checkDataBase.php");

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
	        header("Location: http://$host/mlkvplan/remoteApp/remoteUpload.php");
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