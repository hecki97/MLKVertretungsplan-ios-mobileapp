<?php
  $hostname = $_SERVER['HTTP_HOST'];
  $path = dirname($_SERVER['PHP_SELF']);

  if(!file_exists("data"))
    mkdir("data");

  if(isset($_REQUEST["fflash"]))
    header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index_flash.php');

  $versionFile = fopen("http://dl.dropboxusercontent.com/u/107727443/mlkvplaniosappVersion.txt/", "r");
  $version = fgets($versionFile);

  $datei_modul2 = "data/datum_modul2.dat";
  $fp_modul2 = fopen($datei_modul2, "r");

  $datei_modul1 = "data/datum_modul1.dat";
  $fp_modul1 = fopen($datei_modul1, "r");

?>

<html>
  <head>
    <title>MLK-Vertretungsplan</title>
    <link href="icons/apple-touch-icon@60x60.png" rel="apple-touch-icon" />
    <link href="icons/apple-touch-icon@76x76.png" rel="apple-touch-icon" sizes="76x76" />
    <link href="icons/apple-touch-icon@120x120.png" rel="apple-touch-icon" sizes="120x120" />
    <link href="icons/apple-touch-icon@152x152.png" rel="apple-touch-icon" sizes="152x152" />
    <link rel="favicon" href="icons/favicon.ico">
    <meta name="viewport" content="height=device-height, initial-scale=0.75, maximum-scale=0.75, user-scalable=yes" />
    <link rel="stylesheet" type="text/css" href="css/index_stylesheet.css">
  </head>

  <body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">

  <div class="header_container">
    <span style="font-family:fonts;text-align:center;"><h2 class="header">MLK-Vertretungsplan Online<sup>html</sup></h2></span>
  </div>

    <div class="content">
        <table style="text-align: left; width:1200; height:800; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: 50;" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="1" rowspan="1" width="585" height="800" style="border-color:#000000;border-width:2px;border-style:solid;">
              <iframe src="html/modul1.html" name="Vertretungsplan-Modul" scrolling="no" noresize frameborder=0 width="100%" height="100%" style="overflow: hidden;"></iframe>
            </td>
            <td colspan="1" rowspan="1" width="585" height="800" style="border-color:#000000;border-width:2px;border-style:solid;border-left-style:none;">
              <iframe src="html/modul2.html" name="Vertretungsplan-Modul 2" scrolling="no" noresize frameborder=0 width="100%" height="100%" style="overflow: hidden;"></iframe>
            </td>
          </tr>
          <caption align="bottom">
            <p>
              <h3>
                <span style="text-align:left; margin-right:100px; vertical-align:middle;">Letztes Update (Modul1): <?php echo fgets($fp_modul1); ?></span>
                <span style="text-align:right; margin-left:100px; vertical-align:middle;">Letztes Update (Modul2): <?php echo fgets($fp_modul2); ?></span>
              </h3>
            </p>
            <form style"text-align:center;">
              <input type="submit" name="fflash" value="Flash Version">
            </form><br>
          </caption>
        </table>
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