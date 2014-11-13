<?php
	include(dirname(__FILE__)."/_checkDataBase.php");
	include(dirname(__FILE__)."/_loadLangFiles.php");
	include(dirname(__FILE__)."/_getVersionScript.php");
  $host = $_SERVER['SERVER_NAME'];

	$abfrage = "SELECT * FROM `registrierung`";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);

	if ($row->aktiviert != 'true')
		header("Location: http://$host/mlkvplan/modulDisabled.php");

	  if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username = $_POST["username"];
        $passwort = $_POST["passwort"];
        $passwort2 = $_POST["passwort2"];
        $einladungscode = $_POST["einladungscode"];

        if(empty($passwort2) || empty($username) || empty($passwort) || empty($einladungscode))
        {
          ?><script type="text/javascript">alert("<?=$string['javascript.alert']['j.fields']; ?>");</script><?php 
        }
        else
        {
          if ($passwort != $passwort2)
          {
            ?><script type="text/javascript">alert("<?=$string['javascript.alert']['j.registration.error.password']; ?>");</script><?php 
          }
          else
          {
            $passwort = md5($passwort);

            $result = mysql_query("SELECT id FROM login WHERE username LIKE '$username'");
            $menge = mysql_num_rows($result);

            if($menge == 0) 
            {
              $einladungscode = trim($einladungscode);
              $abfrage_key = "SELECT * FROM `key`";
              $ergebnis_key = mysql_query($abfrage_key);
              $row_key = mysql_fetch_object($ergebnis_key);
              if (md5($einladungscode)==$row_key->md5)
              {
                $eintrag = "INSERT INTO login (username, passwort) VALUES ('$username', '$passwort')";
                $eintragen = mysql_query($eintrag);
              }
              else
              {
                ?><script type="text/javascript">alert("<?=$string['javascript.alert']['j.invitation.code']; ?>");</script><?php
              }
              
              if(@$eintragen == true)
              {
                $return = $string['labels']['l.registration.succes']."<b>".$username."</b>".$string['labels']['l.registration.succes.2']." <a href='./login.php'>".$string['links']['a.menu.login']."</a>";
              }
              else
              {
                ?><script type="text/javascript">alert("<?=$string['javascript.alert']['j.error']; ?>");</script><?php
              }
            }
            else 
            {
              ?><script type="text/javascript">alert("<?=$string['javascript.alert']['j.already.exists']; ?>");</script><?php
            }
          }
        }
    }
?>