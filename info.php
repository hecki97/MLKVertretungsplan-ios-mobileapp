<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include(dirname(__FILE__)."/res/php/_loadLangFiles.php"); ?>
<?php include(dirname(__FILE__)."/res/php/_getVersionScript.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include(dirname(__FILE__)."/res/html/htmlHead.html"); ?>
		<title>Info</title>
	</head>
	<body class="metro">
		<header>
          <nav class="navigation-bar dark fixed-top">
            <nav class="navigation-bar-content">
                <a href="./index.php" class="element"><span class="icon-arrow-left-5"></span> MLK-Vertretungsplan online<sup><?=$lang; ?></sup></a>
         
                <span class="element-divider"></span>
                <button class="element brand no-phone no-tablet" onclick="window.location.reload();"><span class="icon-spin"></span></button>
                <span class="element-divider"></span>

                <a class="element brand place-right no-phone no-tablet"><span class="icon-cog"></span></a>
                <span class="element-divider place-right"></span>
                <a class="element place-right no-phone no-tablet"><?=$version; ?></a>
                <span class="element-divider place-right"></span>
                <a href="./login.php" class="element place-right no-phone no-tablet"><span class="icon-key"></span> <?=$string['global']['menu.login']; ?></a>
                <span class="element-divider place-right"></span>
            </nav>
          </nav>
        </header>
		    <table>
		        <tr class="title"><h1><?=$string['info']['info']; ?></h1></tr>
		        <tr><a href="https://github.com/hecki97/MLKVertretungsplan-online"><h2><?=$string['info']['source.code']; ?></h2></a></tr><br/>
		        <tr><h2><?=$string['info']['website']; ?></h2><h3><a href="http://www.mlk-vk.de">www.mlk-vk.de</a></h3></tr><br/>
		        <tr><h2><?=$string['info']['powered.by']; ?> </h2><h3><a href="http://metroui.org.ua">Metro UI CSS 2.0</a></h3><br></tr>
		        <tr><h3><?=$string['info']['c']; ?></h3></tr>
		        <tr><h3><?=$string['info']['version']; ?> <?=$version; ?></h3></tr>
		    </table>
		</nav>
	</body>
</html>