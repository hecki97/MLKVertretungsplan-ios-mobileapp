<?php
  include('footerVersionHandler.php');
  include('fileChecker.php');
  include_once('arrayJSONHandler.php');
  include('forwardScript.php');

  $hostname = $_SERVER['HTTP_HOST'];
  $path = dirname($_SERVER['PHP_SELF']);

  //Zum Login
  forwardButton($hostname, $path, "flogin", "login.php");
  //Zum Flash Plan
  forwardButton($hostname, $path, "fflash", "index_flash.php");

  $mlkvplan_array_modul = DecodeJSONToArray($date_config);

  
  

  function CheckTimestamp($modulTimestamp_name, $modul_name)
  {
    if ($modulTimestamp_name != strtotime(date("d/m/y")))
      echo ("<span style ='color:#B40404; font-size:25px'>".$modul_name." ist nicht aktuell!</span>");
    else
      echo ("<span style ='color:#007236; font-size:25px'>".$modul_name." ist aktuell!</span>");
  }
?>

<html>
  <head>
    <title>MLK-Vertretungsplan</title>
    <link href="icons/apple-touch-icon@60x60.png" rel="apple-touch-icon" sizes="60x60" />
    <link href="icons/apple-touch-icon@76x76.png" rel="apple-touch-icon" sizes="76x76" />
    <link href="icons/apple-touch-icon@120x120.png" rel="apple-touch-icon" sizes="120x120" />
    <link href="icons/apple-touch-icon@152x152.png" rel="apple-touch-icon" sizes="152x152" />
    <link rel="favicon" href="icons/favicon.ico">
    <meta name="viewport" content="height=device-height, initial-scale=0.75, maximum-scale=0.75, user-scalable=yes" />
    <link rel="stylesheet" type="text/css" href="css/index_stylesheet.css">
  </head>

  <body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">

  <div class="header_container">
    <form action='index.php'>
      <span style="font-family:fonts;text-align:center; margin-right:100px; vertical-align:middle;"><h2 class="header">MLK-Vertretungsplan Online<sup>html</sup></span>
      <div class="login"><input type="submit" name="flogin" value="Zum Login!"></h2></div></span>
    </form>
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
          <caption align="head">
          <p>
            <h3>
              <span style="text-align:left; margin-right:225px; vertical-align:left;">
                <?php
                  if(!empty($mlkvplan_array_modul->Datum_Modul1))
                    CheckTimestamp(strtotime($mlkvplan_array_modul->Datum_Modul1),"modul1");
                  else
                    echo "Timestamp konnte nicht geprueft werden!";
                ?></span>
              <span style="text-align:right; margin-left:225px; vertical-align:right;">
                <?php
                  if(!empty($mlkvplan_array_modul->Datum_Modul1))
                    CheckTimestamp(strtotime($mlkvplan_array_modul->Datum_Modul2),"modul2");
                  else
                    echo "Timestamp konnte nicht geprueft werden!";
                ?></span>
            </h3>
          </p>
          </caption>
          <caption align="bottom">
            <p>
              <h3>
                <span style="text-align:left; margin-right:50px; vertical-align:middle;">Letztes Update (Modul1):
                    <?php
                      if(!empty($mlkvplan_array_modul->Datum_Modul1))
                        echo "Letztes Update: ".$mlkvplan_array_modul->Datum_Modul1;
                      else
                        echo "???";
                    ?></span>
                <span style="text-align:right; margin-left:50px; vertical-align:middle;">Letztes Update (Modul2):
                   <?php
                      if(!empty($mlkvplan_array_modul->Datum_Modul2))
                        echo "Letztes Update: ".$mlkvplan_array_modul->Datum_Modul2;
                      else
                        echo "???";
                    ?></span>
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