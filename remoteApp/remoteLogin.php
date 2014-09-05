<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php include("$root/mlkvplan/remoteApp/res/html/htmlHead.html"); ?>
<?php include("$root/mlkvplan/remoteApp/res/php/_remoteLogin.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>MLK-Vertretungsplan RemoteApp</title>
	</head>
	<body class="metro">
	<header>
    	<nav class="navigation-bar dark fixed-top">
      		<nav class="navigation-bar-content">
	          	<a class="element"><span class="icon-home"></span> RemoteApp<sup><?php echo $lang; ?></sup></a>
	   
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

	<div class="container" style="text-align: center;">
	    <h1><?php echo $string['login']['ueberschrift']; ?></h1>
	    <form action="remoteLogin.php" method="post">
	      <table cellpadding="2" align="center">
	        <tr>
	          <th>
	            <span style ='font-size:15px'><?php echo $string['login']['username']; ?></span>
	          </th>
	          <th>
	            <span style ='font-size:15px'><input type="text" name="username" /></span>
	          </th>
	        </tr>
	        <tr>
	          <th>
	            <span style ='font-size:15px'><?php echo $string['login']['password']; ?></span>
	          </th>
	          <th>
	            <span style ='font-size:15px'><input type="password" name="password" /></span>
	          </th>
	        </tr>
	      </table>
	      <br/><input type="submit" value="<?php echo $string['login']['button.submit.anmelden']; ?>" />
	    </form>
  	</div>

	</body>
</html>