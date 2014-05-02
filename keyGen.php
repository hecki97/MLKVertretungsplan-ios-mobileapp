<?php
  include('auth.php');
  include('footerVersionHandler.php');
  include('fileChecker.php');
  include_once('arrayJSONHandler.php');

  $hostname = $_SERVER['HTTP_HOST'];
  $path = dirname($_SERVER['PHP_SELF']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(isset($_REQUEST["fback"]))
      header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/settings.php');

    if(isset($_REQUEST["uarandom"]))
    {
      $randKey = uniqid();
      $key = substr($randKey, 0, -1);
      $array['Key'] = md5($key);
      EncodeArrayToJSON($key_config, $array);
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
          <h2><span style="color:#FFBF00;">Achtung dieser Code verfaellt sobald die Seite verlassen wird!</span></h2>
          <form action="keyGen.php" method="post">
            <input type="submit" name="uarandom" value="Einladungscode generieren"><br />
            <h2>Einladungscode:</h2>
              <span style = 'font-style:italic;font-size:35px;'>
              <?php 
                if(!empty($key))
                  echo $key;
                else
                  echo "???";
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