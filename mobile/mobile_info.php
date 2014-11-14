<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include(dirname(__FILE__)."/res/php/_mobile_info.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include(dirname(__FILE__)."/res/html/mobileHtmlHead.html"); ?>
        <title>MLK-Vertretungsplan mobile</title>
    </head>
    <body class="metro" style="text-align: center;">
    	<header>
          <nav class="navigation-bar dark fixed-top">
            <nav class="navigation-bar-content">
                <a href="./index.php" class="element"><span class="icon-arrow-left-5"></span> <?=$string['labels']['l.mlkvplan']; ?><sup><?=checkVersion(); ?></sup></a>
            </nav>
          </nav>
        </header>
        <table>
            <tr class="title"><h1><?=$string['labels']['l.info']; ?></h1></tr>
            <tr><h2><a href="https://github.com/hecki97/MLKVertretungsplan-online"><?=$string['labels']['l.source.code']; ?></a></h2></tr><br/>
            <tr><h2><?=$string['labels']['l.website']; ?></h2><h3><a href="http://www.mlk-vk.de">www.mlk-vk.de</a></h3></tr><br/>
            <tr><h2><?=$string['labels']['l.powered.by']; ?> </h2><h3><a href="http://metroui.org.ua">Metro UI CSS 2.0</a></h3><br></tr>
        </table>
        <h2><?=$string['labels']['l.version']; ?></h2>
        <form action="./mobile_info.php" style="display: inline;"><input type="submit" name="html" value="html" style="width: 25%;" /></form>
        <form action="./mobile_info.php" style="display: inline;"><input type="submit" name="flash" value="flash" style="width: 25%;" /></form>
		<table>
            <tr><h4><?=$string['labels']['l.c']; ?></h4></tr>
            <tr><h4><?=$string['labels']['l.version']; ?> <?=$version; ?></h4></tr>
        </table>
        </body>
</html>