<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php $host = $_SERVER['SERVER_NAME']; ?>
<?php include("$root/mlkvplan/remoteApp/res/html/htmlHead.html"); ?>
<?php include("$root/mlkvplan/res/php/_loadLangFiles.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>MLK-Vertretungsplan RemoteApp</title>
		<link rel="stylesheet" type="text/css" href="http://<?php echo $host; ?>/mlkvplan/remoteApp/res/css/stylesheet.css"/>
	</head>
	<body class="metro">	
    	<div id="head">
    		<h1><?php echo $string['remoteApp']['index']['ueberschrift']; ?></h1>
    		<h2><?php echo $string['remoteApp']['index']['unterueberschrift']; ?></h2>
    	</div>
    	<div id="content">
    		<h3><?php echo $string['remoteApp']['index']['appname']; ?></h3>
    		<input type="submit" name="auswahl" value="<?php echo $string['remoteApp']['index']['button.submit.download']; ?> [1.0]" /><br>
    		<h6>[<?php echo $string['remoteApp']['index']['benoetigt']; ?> <a href="http://get.adobe.com/de/air/" target="_blank">AdobeAir</a>]</h6>
    	</div>
		<div>
        	<iframe class="remoteLogin" name="remoteLogin" src="http://<?php echo $host; ?>/mlkvplan/remoteApp/remoteLogin.php"></iframe>
    	</div>
	</body>
</html>