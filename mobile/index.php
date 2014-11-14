<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include(dirname(__FILE__)."/res/php/_index.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include(dirname(__FILE__)."/res/html/mobileHtmlHead.html"); ?>
        <title>MLK-Vertretungsplan mobile</title>
        <link rel="stylesheet" href="../res/css/mobile_stylesheet.css" />
    </head>
    <style type="text/css">
        body, html { 
            overflow-x: hidden; 
            overflow-y: auto;
            background-color: #f1f1f1;
            text-align: center;
        }

        .box {
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
        }
    </style>
    <body class="metro">
      	<header>
          <nav class="navigation-bar dark fixed-top">
            <nav class="navigation-bar-content" style="text-align: center;">
                <button class="element" onclick="window.location.reload();"><span class="icon-home"></span> <?=$string['labels']['l.mlkvplan']; ?><sup><?=checkVersion(); ?></sup></button>
            </nav>
          </nav>
        </header>
        <nav class="vertical-menu">
        <ul>
            <li>
                <a href="./mobile_modul.php?do=modul1">
                    <div class="tile double <?=$modul1_bg; ?> box">
                        <div class="tile-content icon box"><i class="icon-file"></i></div>
                        <div class="tile-status"><span class="name" style="text-align: center;"><?=$modul1_tileStatus; ?></span></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="./mobile_modul.php">
                    <div class="tile double <?=$modul2_bg; ?> box">
                        <div class="tile-content icon"><i class="icon-file"></i></div>
                        <div class="tile-status"><span class="name" style="text-align: center;"><?=$modul2_tileStatus; ?></span></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="./mobile_info.php">
                    <div class="tile double bg-gray box">
                        <div class="tile-content icon"><i class="icon-info"></i></div>
                        <div class="tile-status"><span class="name" style="text-align: center;"><?=$version; ?></span></div>
                    </div>
                </a>
            </li>
        </ul>
        </nav>    
    </body>