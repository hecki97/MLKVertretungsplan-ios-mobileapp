<?php
	$host = $_SERVER['SERVER_NAME'];
	include(dirname(__FILE__)."/../../../res/php/_loadLangFiles.php");
	include(dirname(__FILE__)."/../../../res/php/_getVersionScript.php");
	include(dirname(__FILE__)."/../../../res/php/_checkDataBase.php");

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	    if (!empty($_POST["username"]) && !empty($_POST["password"]))
	    {
	      session_start();

	      $username = $_POST["username"]; 
	      $passwort = md5($_POST["password"]); 

	      $abfrage = "SELECT username, passwort FROM mlkvplan_login WHERE username LIKE '$username' LIMIT 1"; 
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