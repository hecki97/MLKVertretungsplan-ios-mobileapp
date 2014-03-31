<?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      session_start();

      $username = $_POST['username'];
      $passwort = $_POST['passwort'];

      $hostname = $_SERVER['HTTP_HOST'];
      $path = dirname($_SERVER['PHP_SELF']);

      // Benutzername und Passwort werden überprüft
      if ($username == 'admin' && $passwort == '25565') {
       $_SESSION['angemeldet'] = true;

       header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/onlineEditor.php?user='.$username);
       exit;
       }
      }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
 <head>
  <title>Sicherer Bereich</title>
  <meta name="viewport" content="height=device-height, initial-scale=1.25, maximum-scale=1.5, user-scalable=yes" />
 </head>
 <body>
  <h1>Login Informationen eingeben:</h1>
  <form action="login.php" method="post">
   Username: <input type="text" name="username" /><br />
   Passwort: <input type="password" name="passwort" /><br />
   <input type="submit" value="Anmelden" />
  </form>
 </body>
</html>