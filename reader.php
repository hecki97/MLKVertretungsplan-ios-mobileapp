<?php
    include('auth.php');

    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

    if(!file_exists("data"))
      mkdir("data");

    if(isset($_REQUEST["fback"]))
        header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/onlineEditor.php');

    $versionFile = fopen("http://dl.dropboxusercontent.com/u/107727443/mlkvplaniosappVersion.txt/", "r");
    $version = fgets($versionFile);

    $datei_modul2 = "data/datum_modul2.dat";
    $fp_modul2 = fopen($datei_modul2, "r");

    $datei_modul1 = "data/datum_modul1.dat";
    $fp_modul1 = fopen($datei_modul1, "r");
?>
<html>
<head>
    <title>Datum darstellen</title>
    <meta name="viewport" content="height=device-height, initial-scale=1.25, maximum-scale=1.5, user-scalable=yes" />
    <link rel="stylesheet" type="text/css" href="default_stylesheet.css">
</head>

<body>
<div class="content_container">
    <div class="content">
        <div class="text">
            <h1>Aktuelles Datum:</h1>
              <h3> Letztes Update (Modul1): <?php echo fgets($fp_modul1); ?></h3>
              <h3> Letztes Update (Modul2): <?php echo fgets($fp_modul2); ?></h3>
            <form>
                <br><input type="submit" name="fback" value="Zur Auswahl">
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