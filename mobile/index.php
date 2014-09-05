<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php include("$root/mlkvplan/mobile/res/html/mobileHtmlHead.html"); ?>
<?php include("$root/mlkvplan/mobile/res/php/_index.php"); ?>
<?php include("$root/mlkvplan/mobile/res/php/_mobile_checkCookie.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>MLK-Vertretungsplan mobile</title>
        <link rel="stylesheet" href="../css/mobile_stylesheet.css" />
    </head>
    <style type="text/css">
        body, html { 
            overflow-x: hidden; 
            overflow-y: auto;
            background-color: #f1f1f1;
        }

        .box {
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
        }
    </style>
    <body class="metro" style="text-align: center;">
      	<header>
          <nav class="navigation-bar dark fixed-top">
            <nav class="navigation-bar-content" style="text-align: center;">
                <button class="element" onclick="window.location.reload();"><span class="icon-home"></span> MLK-Vertretungsplan<sup><?php echo $version_sup; ?></sup></button>
            </nav>
          </nav>
        </header>
        <nav class="vertical-menu">
        <ul>
            <li>
                <a href="./mobile_modul.php?do=modul1">
                    <div class="tile double <?php echo $modul2_bg; ?> box">
                        <div class="tile-content icon box">
                            <i class="icon-file"></i>
                        </div>
                        <div class="tile-status">
                            <span class="name" style="text-align: center;"><?php echo $modul1_tileStatus; ?></span>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="./mobile_modul.php">
                    <div class="tile double <?php echo $modul2_bg; ?> box">
                        <div class="tile-content icon">
                            <i class="icon-file"></i>
                        </div>
                        <div class="tile-status">
                            <span class="name" style="text-align: center;"><?php echo $modul2_tileStatus; ?></span>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="./mobile_info.php">
                    <div class="tile double bg-gray box">
                        <div class="tile-content icon">
                            <i class="icon-info"></i>
                        </div>
                        <div class="tile-status">
                            <span class="name" style="text-align: center;"><?php echo $version; ?></span>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
        </nav>    
    </body>