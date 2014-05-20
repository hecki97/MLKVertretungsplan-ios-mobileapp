<?php include('./include_mobile.php'); ?>
<html>
<head>
	<!-- Wichtig für iOS -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../icons/apple-touch-icon@60x60.png" rel="apple-touch-icon" sizes="60x60" />
	<link href="../icons/apple-touch-icon@76x76.png" rel="apple-touch-icon" sizes="76x76" />
	<link href="../icons/apple-touch-icon@120x120.png" rel="apple-touch-icon" sizes="120x120" />
	<link href="../icons/apple-touch-icon@152x152.png" rel="apple-touch-icon" sizes="152x152" />
	
	<meta charset="utf-8">
	<title>Modul 1</title>
	<link rel="stylesheet" href="../css/mobile_stylesheet.css" />
	<link rel="stylesheet" href="../lib/jquery_mobile/style/ios7UI.min.css" />
	<link rel="stylesheet" href="../lib/jquery_mobile/style/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head>
<body>
	<div data-role="page" id="modul1" data-theme="a" style="height='device-height';">
		<div data-role="header" data-position="inline" class="ui-bar">
  			<div id="container">
  				<div id="links"><a href="index.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-carat-l ui-btn-icon-left">Home</a></div>
  				<h1 style="padding-top: 13px;">Modul1</h1>
  				<div id="rechts"><a href='#' onclick='location.reload(true); return false;' data-iconpos="notext" class="ui-btn ui-btn-icon-left ui-icon-refresh">.</a></div>
  			</div>
		</div>

	<!-- Check Version -->
		<?php if (!isset($_COOKIE["version"])) : ?>
			<?php $path = '"../html/modul1.html"'; ?>
		<?php else : ?>
			<?php $path = '"https://light.dsbcontrol.de/DSBlightWebsite/(S(wns2f3dhy5w21zzxuzomq1ph))/Homepage/PreProgram.aspx?ID=a290d4b8-79f8-4afe-a676-d15b75233151&ID2=d24a5dd7-48c6-4b27-8f79-464a62af12bf"'; ?>
		<?php endif; ?>

	<!-- Modul -->
		<div data-role="body">
		<div id="container" style="padding-top: 10px;">
			<object data=<?php echo $path ?> type="text/html" width="585px" scrolling="yes" height="800px">
				<div>
					<h1>Dieses Gerät unterstüzt kein Flash!</h1>
					<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
				</div>
			</object>
		</div>	
		</div>

		<div id="footer">
			<div data-role="footer">
				<div data-role="navbar" class="ui-navbar" role="navigation">
	    			<ul class="ui-grid-b">
	    				<li class="ui-block-a"><a href="./modul1_mobile.php" data-icon="bars" class="ui-link ui-btn ui-icon-bars ui-btn-icon-top" id="deactivated" style="color: lightgray;">Modul1</a></li>
	    				<li class="ui-block-b"><a href="./about_mobile.php" data-icon="info" class="ui-btn-active ui-link ui-btn ui-icon-info ui-btn-icon-top">Info</a></li>
	    				<li class="ui-block-c"><a href="./modul2_mobile.php" data-icon="bars" class="ui-link ui-btn ui-icon-bars ui-btn-icon-top">Modul2</a></li>
	    			</ul>
    			</div>
        		<h1><? echo $version; ?></h1>
        	</div>
		</div>
	</div>
</body>
</html>