<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $host = $_SERVER['SERVER_NAME']; ?>
<?php include(dirname(__FILE__)."/res/html/mobileHtmlHead.html"); ?>
<?php include(dirname(__FILE__)."/res/php/_mobile_modul.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Modul mobile</title>
    </head>
    <body class="metro" style="text-align: center;">
		<header>
          <nav class="navigation-bar dark fixed-top">
            <nav class="navigation-bar-content">
                <a href="./index.php" class="element"><span class="icon-arrow-left-5"></span> MLK-Vertretungsplan<sup><?php echo $version_sup; ?></sup></a>
            </nav>
          </nav>
        </header>
        
	<!-- Modul -->
		<div id="container" style="padding-top: 10px;">
			<object data="<?php echo $path ?>" type="text/html" width="585px" scrolling="yes" height="800px">
		</div>
	</body>
</html>