<?php
  include('auth.php');
  include('footerVersionHandler.php');
  include('fileChecker.php');
  include_once('arrayJSONHandler.php');
  include('forwardScript.php');

  $hostname = $_SERVER['HTTP_HOST'];
  $path = dirname($_SERVER['PHP_SELF']);

  //Code Generieren
  forwardButton($hostname, $path, "uarandom", "keyGen.php");
  //Zum OnlineEditor
  forwardButton($hostname, $path, "fback", "onlineEditor.php");

?>
<html>
<head>
    <title>Einstellungen</title>
    <meta name="viewport" content="height=device-height, initial-scale=0.75, maximum-scale=1.5, user-scalable=yes" />
    <link rel="stylesheet" type="text/css" href="css/default_stylesheet.css">
</head>

<body>
<div class="content_container">
  <div class="content">
     <div class="text">
        <h1>Einstellungen:</h1>
          <form action="settings.php" method="post">
            <h3>Einladungscode generieren:</h3>
            <input type="submit" name="uarandom" value="Automatisch generieren"><br />
            <h2>Registrierung De/Aktivieren:</h2>
              <span style="text-align:left; margin-right:25px; vertical-align:middle;"><input type="radio" name="check" value="True"> Aktivieren</span>
              <span style="text-align:right; margin-left:25px; vertical-align:middle;"><input type="radio" name="check" value="False"> Deaktivieren<br></span>
              <?php
              if(isset($_POST['auswahl'])) {
                  if($_POST['check'] == "True") {
                      $check_true = "<br><span style='color:#FFBF00; font-style:italic; font-size:35px;'>Aktiviert!</span>";
                      $array['Registrierung_aktiviert'] = "Aktiviert";
                      EncodeArrayToJSON($settings_config, $array);
                  }
                  if($_POST['check'] == "False") {
                      $check_false = "<br><span style='color:#FFBF00; font-style:italic; font-size:35px;'>Deaktiviert</span>";
                      $array['Registrierung_aktiviert'] = "Deaktiviert";
                      EncodeArrayToJSON($settings_config, $array);
                  }
                  if($_POST['check'] == "") {
                      $error_check = "<br><span style='color:#FFBF00; font-style:italic; font-size:25px;'>Bitte eine Auswahl treffen!</span>";
                  }
              }
              ?>
              <input type="submit" name="auswahl" value="Speichern">
              <?php
                $mlkvplan_array_settings = DecodeJSONToArray($settings_config);

                if (empty($check_true) && empty($check_false) && empty($error_check))
                  echo "<br><span style='font-size:35px;'><b>Aktuell:</b> <i>".$mlkvplan_array_settings->Registrierung_aktiviert."</i></span>";
                else if (!empty($check_true))
                  echo $check_true;
                else if (!empty($check_false))
                  echo $check_false; 
                else if (!empty($error_check))
                  echo $error_check;
              ?>
            <h2>File Checker:</h2>
              <iframe src="./fileChecker.php"></iframe>
            <h2>Lokale Daten zuruecksetzen:</h2>     
            <br><br><input type="submit" name="fback" value="Zur Auswahl">
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