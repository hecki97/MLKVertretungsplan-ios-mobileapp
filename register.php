<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include('./htmlHead.html'); ?>
<?php include('./_register.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
    <title>Account erstellen</title>
</head>
<body class="metro">
  <header>
    <nav class="navigation-bar dark fixed-top">
      <nav class="navigation-bar-content">
          <button href="./mlkVPlan.php" class="element"><span class="icon-arrow-left-5"></span> MLK-Vertretungsplan online</button>
   
          <span class="element-divider"></span>
          <button class="element brand" onclick="window.location.reload();"><span class="icon-spin"></span></button>
          <span class="element-divider"></span>

          <a href="./info.php" class="element brand place-right"><span class="icon-cog"></span></a>
          <span class="element-divider place-right"></span>
          <a class="element place-right">
            <?php echo $version; ?>
          </a>
          <span class="element-divider place-right"></span>
          <a href="./login.php" class="element place-right">
            <span class="icon-key"></span> Zum Login!
          </a>
          <span class="element-divider place-right"></span>
      </nav>
    </nav>
  </header>

<div class="container" style="text-align: center;">
  <h1>Account erstellen:</h1>
    <form action="register.php" method="post">
      <h3> Anmeldeinformationen eingeben:</h3>
      
      <table cellpadding="2" align="center">
        <tr>
          <th>
            <span style ='font-size:15px'>Benutzername:</span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="text" name="username" /></span>
          </th>
        </tr>
        <tr>
          <th>
            <span style ='font-size:15px'>Passwort:</span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="password" name="password" /></span>
          </th>
        </tr>
        <tr>
          <th>
            <span style ='font-size:15px'>Passwort(wdh):</span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="password" name="passwort2" /></span>
          </th>
        </tr>
        <tr>
          <th>
            <span style ='font-size:15px'>Einladungscode:</span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="text" name="einladungscode" /></span>
          </th>
        </tr>
      </table>
      <br><input type="submit" name="uregister" value="Registrieren">
             
      <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
      <ul>
        <?php $username = $_POST["username"]; ?>
        <?php $passwort = $_POST["passwort"]; ?>
        <?php $passwort2 = $_POST["passwort2"]; ?>
        <?php $einladungscode = $_POST["einladungscode"]; ?>

        <?php if($passwort != $passwort2 || $username == "" || $passwort == "" || $einladungscode == "") : ?>
        <ul>
          Eingabefehler. Bitte alle Felder korekt ausfüllen.
          <?php exit; ?>
        </ul>
        <?php endif; ?> 
        <?php $passwort = md5($passwort); ?>

        <?php $result = mysql_query("SELECT id FROM login WHERE username LIKE '$username'"); ?>
        <?php $menge = mysql_num_rows($result); ?>

        <?php if($menge == 0) : ?> 
        <ul>
          <?php $einladungscode = trim($einladungscode); ?>
          <?php $mlkvplan_array_key = DecodeJSONToArray($key_config); ?>

          <?php if (md5($einladungscode)==$mlkvplan_array_key->Key) : ?>
          <ul>
            <?php $eintrag = "INSERT INTO login (username, passwort) VALUES ('$username', '$passwort')"; ?>
            <?php $eintragen = mysql_query($eintrag); ?>
          </ul>
          <?php else : ?>
          <ul>
            Der eingegebene Einladungscode ist nicht korrekt!
          </ul>
          <?php endif; ?>

          <?php if($eintragen == true) : ?>
          <ul>
            Benutzername <b><?php echo $username; ?></b> wurde erstellt. <a href="./login.php">Login</a> 
          </ul>
          <?php else : ?> 
          <ul>
            Fehler beim Speichern des Benutzernames. Bitte erneut versuchen! 
          </ul>
          <?php endif; ?>
        </ul>
        <?php else : ?> 
        <ul> 
          Benutzername schon vorhanden. Bitte erneut versuchen! 
        </ul>
        <?php endif; ?>
      </ul>
      <?php endif; ?>
      <br><br><input type="submit" name="plan" value="Zum Plan!">
    </form>
  </div>
</body>
</html>