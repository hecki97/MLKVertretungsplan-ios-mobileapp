<?php
  include('footerVersionHandler.php');
  include('fileChecker.php');
  include_once('arrayJSONHandler.php');
  include('forwardScript.php');

  $verbindung = mysql_connect("localhost", "login" , "") or die("Verbindung zur Datenbank konnte nicht hergestellt werden"); 
  mysql_select_db("test") or die ("Datenbank konnte nicht ausgewählt werden"); 
  
  $hostname = $_SERVER['HTTP_HOST'];
  $path = dirname($_SERVER['PHP_SELF']);

  //Zum Plan
  forwardButton($hostname, $path, $buttonName = "plan", $fileName = "index.php");

  $mlkvplan_array_settings = DecodeJSONToArray($settings_config);
  if (!empty($mlkvplan_array_settings->Registrierung_aktiviert) && $mlkvplan_array_settings->Registrierung_aktiviert == "Deaktiviert")
    header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/modulDisabled.html');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST["username"]; 
    $passwort = $_POST["passwort"]; 
    $passwort2 = $_POST["passwort2"];
    $einladungscode = $_POST["einladungscode"];

    if($passwort != $passwort2 OR $username == "" OR $passwort == "" OR $einladungscode == "") 
    { 
      echo "Eingabefehler. Bitte alle Felder korekt ausfüllen. <a href=\"eintragen.html\">Zurück</a>"; 
      exit; 
    } 
    $passwort = md5($passwort); 

    $result = mysql_query("SELECT id FROM login WHERE username LIKE '$username'"); 
    $menge = mysql_num_rows($result); 

    if($menge == 0) 
    { 
      $einladungscode = trim($einladungscode);
      $mlkvplan_array_key = DecodeJSONToArray($key_config);
      if (md5($einladungscode)==$mlkvplan_array_key->Key)
      {
        $eintrag = "INSERT INTO login (username, passwort) VALUES ('$username', '$passwort')"; 
        $eintragen = mysql_query($eintrag); 
      }
      else
      {
        $error_register_2 = "Der eingegebene Einladungscode ist nicht korrekt!";
      }

      if($eintragen == true) 
      { 
        echo "Benutzername <b>$username</b> wurde erstellt. <a href=\"login.html\">Login</a>"; 
      } 
      else 
      { 
        echo "Fehler beim Speichern des Benutzernames. <a href=\"eintragen.html\">Zurück</a>"; 
      }
    } 
    else 
    { 
      echo "Benutzername schon vorhanden. <a href=\"eintragen.html\">Zurück</a>"; 
    }
  } 
?>
<html>
<head>
    <title>Account erstellen</title>
    <meta name="viewport" content="height=device-height, initial-scale=1.25, maximum-scale=1.5, user-scalable=yes" />
    <link rel="stylesheet" type="text/css" href="css/default_stylesheet.css">
</head>

<body>
<div class="content_container">
  <div class="content">
     <div class="text">
        <h1>Account erstellen:</h1>
          <form action="register.php" method="post">
            <h3> Anmeldeinformationen eingeben:</h3>
              
             Benutzername:<div class="pagewrapper"><input type="text" name="username" /><br /></div>
             Passwort:<div class="pagewrapper"><input type="password" name="passwort"/><br /></div>
             Passwort(wdh):<div class="pagewrapper"><input type="password" name="passwort2" /><br /></div>
             Einladungscode:<div class="pagewrapper"><input type="text" name="einladungscode" /><br />
              </div>
             <br><input type="submit" name="uregister" value="Registrieren">
             <br><br><input type="submit" name="plan" value="Zum Plan!">
             <br><?php
                  if (!empty($error_register_1))
                    echo $error_register_1;
                  else if (!empty($error_register_2))
                    echo $error_register_2;
                  else if (!empty($error_register_3))
                    echo $error_register_3;
                  else if (!empty($register))
                    echo $register;
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