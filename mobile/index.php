<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include('./mobileHtmlHead.html'); ?>
<?php include('./_index.php'); ?>
<?php include('./_mobile_checkCookie.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>MLK-Vertretungsplan mobile</title>
        <link rel="stylesheet" href="../css/mobile_stylesheet.css" />
    </head>
    <style type="text/css">
        body, html { 
            overflow-x: hidden; 
            overflow-y: auto;
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
        <ul class="menu">
            <li id="modul1">
                <a href="./mobile_modul1.php">
                    <div class="tile double bg-gray">
                        <div class="tile-content icon">
                            <i class="icon-file"></i>
                        </div>
                        <div class="tile-status">
                            <span class="name"><?php echo $modul1_tileStatus; ?></span>
                        </div>
                        <div class="brand">
                            <div class="<?php echo $modul1_badge; ?>"></div>
                        </div>
                    </div>
                </a>
            </li>
            <li id="modul2">
                <a href="./mobile_modul2.php">
                    <div class="tile double bg-gray">
                        <div class="tile-content icon">
                            <i class="icon-file"></i>
                        </div>
                        <div class="tile-status">
                            <span class="name"><?php echo $modul2_tileStatus; ?></span>
                        </div>
                        <div class="brand">
                            <div class="<?php echo $modul2_badge; ?>"></div>
                        </div>
                    </div>
                </a>
            </li>
            <li id="info">
                <a href="./mobile_info.php">
                    <div class="tile double bg-gray">
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
    </body>