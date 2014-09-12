<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include(dirname(__FILE__)."/res/html/htmlHead.html"); ?>
<?php include(dirname(__FILE__)."/res/php/_remoteLogin.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>MLK-Vertretungsplan RemoteApp</title>
	</head>
	<body class="metro">
	<header>
    	<nav class="navigation-bar dark fixed-top">
      		<nav class="navigation-bar-content">
	          	<a class="element"><span class="icon-home"></span> RemoteApp<sup><?=$lang; ?></sup></a>
	   
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

	<div class="container" style="text-align: center;">
	    <h1><?=$string['login']['ueberschrift']; ?></h1>
	    <form action="remoteLogin.php" method="post">
	      <table cellpadding="2" align="center">
	        <tr>
	          <th>
	            <span style ='font-size:15px'><?=$string['login']['username']; ?></span>
	          </th>
	          <th>
	            <span style ='font-size:15px'><input type="text" name="username" /></span>
	          </th>
	        </tr>
	        <tr>
	          <th>
	            <span style ='font-size:15px'><?=$string['login']['password']; ?></span>
	          </th>
	          <th>
	            <span style ='font-size:15px'><input type="password" name="password" /></span>
	          </th>
	        </tr>
	      </table>
	      <br/><input type="submit" value="<?=$string['login']['button.submit.anmelden']; ?>" />
	    </form>
  	</div>

	</body>
</html>