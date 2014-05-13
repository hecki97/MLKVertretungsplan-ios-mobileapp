<?php
  include('footerVersionHandler.php');
  include('fileChecker.php');
  include('buttonScript.php');
  
   $verbindung = mysql_connect("localhost", "login" , "") or die("Verbindung zur Datenbank konnte nicht hergestellt werden"); 
  mysql_select_db("test") or die ("Datenbank konnte nicht ausgewählt werden"); 

  $hostname = $_SERVER['HTTP_HOST'];
  $path = dirname($_SERVER['PHP_SELF']);

  //Registrieren
  forwardButton($hostname, $path, "register", "register.php");
  //Zum Plan
  forwardButton($hostname, $path, "fback", "index.php");

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
      echo "Benutzername und/oder Passwort waren falsch. <a href=\"login.html\">Login</a>"; 
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
         Passwort:<div class="pagewrapper"><input type="password" name="password" /><br /></div>
         <br><input type="submit" value="Anmelden" />
         <br><input type="submit" name="register" value="Account erstellen" />
         <br><br><input type="submit" name="fback" value="Zum Plan!" />
         <form action='login.php'>
              <?php
                if(!empty($error_login))
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