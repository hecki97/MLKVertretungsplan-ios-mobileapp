<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include('./mobileHtmlHead.html'); ?>
<?php include('../_getVersionScript.php'); ?>
<?php include('./_mobile_checkCookie.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Modul2 mobile</title>
    </head>
    <body class="metro" style="text-align: center;">
		<header>
          <nav class="navigation-bar dark fixed-top">
            <nav class="navigation-bar-content">
                <a href="./index.php" class="element"><span class="icon-arrow-left-5"></span> MLK-Vertretungsplan<sup><?php echo $version_sup; ?></sup></a>
            </nav>
          </nav>
        </header>

		<!-- Check Version -->
		<?php if($_COOKIE["mobile_version"] == "html") : ?>
	  		<?php $path = '"../html/modul2.html"'; ?>
	  	<?php else : ?>
	  		<?php $path = '"https://light.dsbcontrol.de/DSBlightWebsite/(S(wns2f3dhy5w21zzxuzomq1ph))/Homepage/PreProgram.aspx?ID=9de26a53-1a27-40ed-9ee1-82b65a6bcb38&ID2=d24a5dd7-48c6-4b27-8f79-464a62af12bf"'; ?>
	  	<?php endif; ?>
		<!-- Modul -->
		<div id="container" style="padding-top: 10px;">
			<object data=<?php echo $path ?> type="text/html" width="585px" scrolling="yes" height="800px">
		</div>
	</body>
</html>