<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include(dirname(__FILE__)."/res/php/_mobile_modul.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include(dirname(__FILE__)."/res/html/mobileHtmlHead.html"); ?>
        <title>Modul mobile</title>
    </head>
    <body class="metro" style="text-align: center;">
		<header>
          <nav class="navigation-bar dark fixed-top">
            <nav class="navigation-bar-content">
                <a href="./index.php" class="element"><span class="icon-arrow-left-5"></span> <?=$string['labels']['l.mlkvplan']; ?><sup><?=checkVersion(); ?></sup></a>
            </nav>
          </nav>
        </header>
        
	<!-- Modul -->
		<div id="container" style="padding-top: 10px;">
            <object data=<?=$path ?> type="text/html" width="450px" height="800px">
		</div>
	</body>
</html>