<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php $host = $_SERVER['SERVER_NAME']; ?>
<?php include("$root/mlkvplan/remoteApp/res/html/htmlHead.html"); ?>
<?php include("$root/mlkvplan/res/php/_loadLangFiles.php"); ?>
<?php include("$root/mlkvplan/res/php/_getVersionScript.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>MLK-Vertretungsplan RemoteApp</title>
	</head>
	<body class="metro" style="text-align: center;">
	<header>
    	<nav class="navigation-bar dark fixed-top">
      		<nav class="navigation-bar-content">
	          	<a href="http://<?php echo $host; ?>/mlkvplan/remoteApp/res/php/_remoteLogout.php" class="element"><span class="icon-arrow-left-5"></span> RemoteApp<sup><?php echo $lang; ?></sup></a>
	   
		        <span class="element-divider"></span>
		        <button class="element brand" onclick="window.location.reload();"><span class="icon-spin"></span></button>
		        <span class="element-divider"></span>

		        <a href="./remoteInfo.php" class="element brand place-right"><span class="icon-cog"></span></a>
		        <span class="element-divider place-right"></span>
		        <a class="element place-right">
		            <?php echo $version; ?>
		        </a>
		        <span class="element-divider place-right"></span>
      		</nav>
   		</nav>
	</header>
		<h1>Diese Seite ist derzeit nicht verfügbar!</h1>
		<h2>Das tut uns Leid<sup>TM</sup></h2>
		<form action="remoteLogin.php">
			<input type="submit" name="fback" value="<?php echo $string['global']['button.submit.plan']; ?>" />
		</form>
	</body>
</html>