<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $host = $_SERVER['SERVER_NAME']; ?>
<?php include(dirname(__FILE__)."/res/html/htmlHead.html"); ?>
<?php include(dirname(__FILE__)."../res/php/_loadLangFiles.php"); ?>
<?php include(dirname(__FILE__)."../res/php/_getVersionScript.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>MLK-Vertretungsplan RemoteApp</title>
	</head>
	<body class="metro" style="text-align: center;">
	<header>
    	<nav class="navigation-bar dark fixed-top">
      		<nav class="navigation-bar-content">
	          	<a href="http://<?=$host; ?>/mlkvplan/remoteApp/res/php/_remoteLogout.php" class="element"><span class="icon-arrow-left-5"></span> RemoteApp<sup><?=$lang; ?></sup></a>
	   
		        <span class="element-divider"></span>
		        <button class="element brand" onclick="window.location.reload();"><span class="icon-spin"></span></button>
		        <span class="element-divider"></span>

		        <a href="./remoteInfo.php" class="element brand place-right"><span class="icon-cog"></span></a>
		        <span class="element-divider place-right"></span>
		        <a class="element place-right">
		            <?=$version; ?>
		        </a>
		        <span class="element-divider place-right"></span>
      		</nav>
   		</nav>
	</header>
		<nav class="vertical-menu">
		    <ul>
		        <li class="title"><h1><?=$string['info']['info']; ?></h1></li>
		        <li><a href="https://github.com/hecki97/MLKVertretungsplan-ios-mobileapp"><h2><?=$string['info']['source.code']; ?></h2></a></li><br/>
		        <li><h2><?=$string['info']['website']; ?></h2><h3><a href="http://www.mlk-vk.de">www.mlk-vk.de</a></h3></li><br/>
		        <li><h2><?=$string['info']['powered.by']; ?> </h2><h3><a href="http://metroui.org.ua">Metro UI CSS 2.0</a></h3><br></li>
		        <li><a><?=$string['info']['c']; ?></a></li>
		        <li><a><?=$string['info']['version']; ?> <?php echo $version; ?></a></li>
		    </ul>
		</nav>
		<form action="remoteLogin.php">
			<input type="submit" name="fback" value="<?=$string['global']['button.submit.plan']; ?>" />
		</form>
	</body>
</html>