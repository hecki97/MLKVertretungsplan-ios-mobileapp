<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include('./mobileHtmlHead.html'); ?>
<?php include('./_mobile_info.php'); ?>
<?php include('./_mobile_checkCookie.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>MLK-Vertretungsplan mobile</title>
    </head>
    <body class="metro" style="text-align: center;">
    	<header>
          <nav class="navigation-bar dark fixed-top">
            <nav class="navigation-bar-content">
                <a href="./index.php" class="element"><span class="icon-arrow-left-5"></span> MLK-Vertretungsplan<sup><?php echo $version_sup; ?></sup></a>
            </nav>
          </nav>
        </header>

        <nav class="vertical-menu">
		    <ul>
		        <li class="title"><h1>About</h1></li>
		        <li><a href="https://github.com/hecki97/MLKVertretungsplan-ios-mobileapp"><h2>Source Code(Github)</h2></a></li><br/>
		        <li><h2>Powered by: </h2><h3><a href="http://metroui.org.ua">Metro UI CSS 2.0</a></h3><br></li>
		        <li><a>© 2014 - hecki97</a></li>
		        <li><a>Version: <?php echo $version; ?></a></li>
		    </ul>
		</nav>

		<br/><form><input type="submit" name="mobileCookie" value="Version ändern!" /></form><br/>
    </body>
</html>