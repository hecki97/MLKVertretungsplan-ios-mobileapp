<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include(dirname(__FILE__)."/res/html/htmlHead.html"); ?>
<?php include(dirname(__FILE__)."/res/php/_loadLangFiles.php"); ?>
<?php include(dirname(__FILE__)."/res/php/_getVersionScript.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Disabled</title>
	</head>
	<body class="metro">
		<header>
          <nav class="navigation-bar dark fixed-top">
            <nav class="navigation-bar-content">
                <button href="./mlkvplan.php" class="element"><span class="icon-home"></span> MLK-Vertretungsplan online<sup><?=$lang; ?></sup></button>
         
                <span class="element-divider"></span>
                <button class="element brand no-phone no-tablet" onclick="window.location.reload();"><span class="icon-spin"></span></button>
                <span class="element-divider"></span>

                <a href="./info.php" class="element brand place-right no-phone no-tablet"><span class="icon-cog"></span></a>
                <span class="element-divider place-right"></span>
                <a class="element place-right no-phone no-tablet">
                  <?=$version; ?>
                </a>
                <span class="element-divider place-right"></span>
                <a href="./login.php" class="element place-right no-phone no-tablet">
                  <span class="icon-key"></span> <?=$string['global']['menu.login']; ?>
                </a>
                <span class="element-divider place-right"></span>
            </nav>
          </nav>
        </header>

		<div class="container" style="text-align: center;">
			<h1><?=$string['modul.disabled']['modul.deaktiviert']; ?></h1>
			<h2><?=$string['modul.disabled']['sorry']; ?><sup>TM</sup></h2>
			<form action="./mlkVPlan.php">
	            <input type="submit" name="zumPlan" value="<?=$string['global']['button.submit.plan']; ?>"><br />
	        </form>
    	</div>
	</body>
</html>