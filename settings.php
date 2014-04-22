<?php
  include('auth.php');

  $hostname = $_SERVER['HTTP_HOST'];
  $path = dirname($_SERVER['PHP_SELF']);

  if(!file_exists("data"))
    mkdir("data");

  $datei = "data/key.dat";
  
  $versionFile = fopen("http://dl.dropboxusercontent.com/u/107727443/mlkvplaniosappVersion.txt/", "r");
  $version = fgets($versionFile);

  if(isset($_REQUEST["fback"]))
      header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/onlineEditor.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_REQUEST["umrandom"]))
    {
      header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/seed.php');
    }

    if(isset($_REQUEST["uarandom"]))
    {
      $randVal_1 = mt_rand(1000, 9999);
      $randVal_2 = mt_rand(1000, 9999);
      $randVal_3 = mt_rand(1000, 9999);
      $randVal_4 = mt_rand(1000, 9999);

      $randGen = md5($randVal_1.'-'.$randVal_2.'-'.$randVal_3.'-'.$randVal_4);

      $fp = fopen($datei, "w+");
      fwrite($fp, $randGen);
      fclose($fp);
    }
   }
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
            <input type="submit" name="umrandom" value="Startwert eingeben"><br />
            <br><input type="submit" name="uarandom" value="Automatisch generieren"><br />
            <h2>Einladungscode:</h2>
              <span style = 'font-style:italic;font-size:35px;'>
              <?php 
                $fp = fopen($datei, "r");
                echo fgets($fp);
                fclose($fp);
              ?></span>
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