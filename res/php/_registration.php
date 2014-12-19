<?php
	include(dirname(__FILE__)."/_checkDataBase.php");
	include(dirname(__FILE__)."/_loadLangFiles.php");
	include(dirname(__FILE__)."/_getVersionScript.php");
  $host = $_SERVER['SERVER_NAME'];

	$row = LoadFromDB($db['t.registration'], true);
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

        $result = mysql_query("SELECT id FROM `".$db['t.login']."` WHERE username LIKE '$username'");
        $menge = mysql_num_rows($result);

        if($menge == 0) 
        {
          $einladungscode = trim($einladungscode);
          $row_key = LoadFromDB($db['t.key'], true);
          if (md5($einladungscode)==$row_key->md5)
          {
            $eintrag = "INSERT INTO `".$db['t.login']."` (username, passwort) VALUES ('$username', '$passwort')";
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