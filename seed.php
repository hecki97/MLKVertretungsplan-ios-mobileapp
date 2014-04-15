<?php
  include('auth.php');

  $hostname = $_SERVER['HTTP_HOST'];
  $path = dirname($_SERVER['PHP_SELF']);

  if(isset($_REQUEST["fback"]))
      header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/settings.php');

  $datei = "data/key.dat";

  $versionFile = fopen("http://dl.dropboxusercontent.com/u/107727443/mlkvplaniosappVersion.txt/", "r");
  $version = fgets($versionFile);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_REQUEST["umrandom"]))
    {
      $seed = $_POST["seedText"];
      $randGen = md5($seed);

      $fp = fopen($datei, "w+");
      fwrite($fp, $randGen);
      fclose($fp);
    }
  }
?>
<html>
  <head>
    <title>Startwert</title>
    <meta name="viewport" content="height=device-height, initial-scale=1.25, maximum-scale=1.5, user-scalable=yes" />
    <link rel="stylesheet" type="text/css" href="default_stylesheet.css">
</head>

<body>
<div class="content_container">
  <div class="content">
     <div class="text">
        <h1>Startwert:</h1>
          <form action="seed.php" method="post">
            <h3>Startwert eingeben:</h3>
            Maximal 19 Zeichen!
            <br><input type="text" name="seedText" maxlength="19">
            <br><input type="submit" name="umrandom" value="Einladungscode generieren">
            <h2>Einladungscode:</h2>
              <span style = 'font-style:italic;font-size:35px;'>
              <?php  
                $fp = fopen($datei, "r");
                echo fgets($fp);
                fclose($fp);
              ?></span>
            <br><br><input type="submit" name="fback" value="Zu den Einstellungen">
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