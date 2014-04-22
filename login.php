<?php
  $hostname = $_SERVER['HTTP_HOST'];
  $path = dirname($_SERVER['PHP_SELF']);

  if(!file_exists("data"))
    mkdir("data");

  $datei = "data/user.dat";
  if (!file_exists($datei))
  {
    $fp = fopen($datei, "w+");
    fclose($fp);
    header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/register.php');
  } 

  $datei = 'data/usrTMP.dat';
  if (file_exists($datei))
    unlink($datei);

  $versionFile = fopen("http://dl.dropboxusercontent.com/u/107727443/mlkvplaniosappVersion.txt/", "r");
  $version = fgets($versionFile);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    $username = $_POST["username"];
    $passwort = $_POST["passwort"];
    $passwort = md5($passwort);

    $log = 0;
    $userdatei = fopen ("data/user.dat","r");
    while (!feof($userdatei))
    {
      $zeile = fgets($userdatei,500);
      $userdata = explode("|", $zeile);

      if ($userdata[0]==$username && $passwort==trim($userdata[1]))
      {
        $log = 1;
        $_SESSION['angemeldet'] = true;

        if (!file_exists($datei))
        {
          $fp = fopen($datei, "w+");
          fwrite($fp, $username);
          fclose($fp);
        } 

        header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/onlineEditor.php');
        exit;
      }
    }
    fclose($userdatei);

    if ($log==0)  
    {
      $error_login = "Zugriff verweigert";
    }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
 <head>
  <title>Sicherer Bereich</title>
  <meta name="viewport" content="height=device-height, initial-scale=1.25, maximum-scale=1.5, user-scalable=yes" />
  <link rel="stylesheet" type="text/css" href="css/default_stylesheet.css">
 </head>

 <body>
  <div class="content_container">
    <div class="content">
      <div class="text">
        <h1>Login Informationen eingeben:</h1>
        <form action="login.php" method="post">
         Benutzername:<div class="pagewrapper"><input type="text" name="username" /><br /></div>
         Passwort:<div class="pagewrapper"><input type="password" name="passwort" /><br /></div>
         <br><input type="submit" value="Anmelden" />
         <form action='login.php'>
              <?php
                echo $error_login;
              ?>
        </form>
      </div>
  </div>
</div>

<div class="footer_container">
  <div class="footer">
    <span style = "font-family:fonts;text-align:center;">
      <b><? echo $version; ?></b>
    </span>
  </div>
</div>

 </body>
</html>