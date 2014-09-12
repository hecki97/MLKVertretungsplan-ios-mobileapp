<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $host = $_SERVER['SERVER_NAME']; ?>
<?php include(dirname(__FILE__)."/res/html/htmlHead.html"); ?>
<?php include(dirname(__FILE__)."/../res/php/_loadLangFiles.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>MLK-Vertretungsplan RemoteApp</title>
		<link rel="stylesheet" type="text/css" href="<?=$host; ?>/mlkvplan/remoteApp/res/css/stylesheet.css"/>
	</head>
	<body class="metro">	
    	<div id="head">
    		<h1><?=$string['remote.app']['index']['ueberschrift']; ?></h1>
    		<h2><?=$string['remote.app']['index']['unterueberschrift']; ?></h2>
    	</div>
    	<div id="content">
    		<h3><?=$string['remote.app']['index']['appname']; ?></h3>
    		<input type="submit" name="auswahl" value="<?=$string['remote.app']['index']['button.submit.download']; ?> [1.0]" /><br>
    		<h6>[<?=$string['remote.app']['index']['benoetigt']; ?> <a href="http://get.adobe.com/de/air/" target="_blank">AdobeAir</a>]</h6>
    	</div>
		<div>
        	<iframe class="remoteLogin" name="remoteLogin" src="./remoteLogin.php"></iframe>
    	</div>
	</body>
</html>