<?php

  $versionFile = fopen("http://dl.dropboxusercontent.com/u/107727443/mlkvplaniosappVersion.txt/", "r");
  $version = fgets($versionFile);

  $datei = "data/key.dat";
  if (!file_exists($datei))
  {
    $fp = fopen($datei, "w+");
    fwrite($fp, md5("0000-0000-0000-0000"));
    fclose($fp);
  }

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $password2 = $_POST["password2"];

      $einladungscode = $_POST["einladungscode"];

      if ($password == $password2)
      {
         $user_vorhanden = array();
         $passwort = md5($password);

         $userdatei = fopen("data/user.dat","r+");
         while(!feof($userdatei))
         {
            $zeile = fgets($userdatei,500);
            $userdata = explode("|", $zeile);
            array_push ($user_vorhanden,$userdata[0]);
         }
         fclose($userdatei);

         if (in_array($username,$user_vorhanden))
         {
            $error_register_1 = "Username schon vorhanden";
         }
         else
         {
            $keycode = fopen("data/key.dat", "r");
            $key = fgets($keycode);
            if (trim($einladungscode)==$key)
            {
              $eintrag ="$username|$passwort";
              $userdatei = fopen("data/user.dat","a");
              fwrite($userdatei, "$eintrag\n");
              fclose($userdatei);
              $register = $username.", deine Registrierung war erfolgreich!
              <br><a href=\"login.php\">zum Login!</a>";
            }
            else
            {
              $error_register_2 = "Der eingegebene Einladungscode ist nicht korrekt!";
            }
         }
      }
      else
      {
         $error_register_3 = "Die Passwörter waren nicht identisch!";
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
             Passwort:<div class="pagewrapper"><input type="password" name="password"/><br /></div>
             Passwort(wdh):<div class="pagewrapper"><input type="password" name="password2" /><br /></div>
             Einladungscode:<div class="pagewrapper"><input type="text" name="einladungscode" /><br />
              </div>
             <br><input type="submit" name="uregister" value="Registrieren">
             <br><?php
                echo $error_register_1,$error_register_2,$error_register_3,$register;
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