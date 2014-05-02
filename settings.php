<?php
  include('auth.php');
  include('footerVersionHandler.php');
  include('fileChecker.php');

  $hostname = $_SERVER['HTTP_HOST'];
  $path = dirname($_SERVER['PHP_SELF']);

  if(isset($_REQUEST["fback"]))
      header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/onlineEditor.php');

  if(isset($_REQUEST["uarandom"]))
      header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/keyGen.php');
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
            <input type="submit" name="uarandom" value="De/Aktivieren!"><br />
            <h2>File Checker:</h2>
            <h2>Daten komplett entfernen:</h2>     
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