<?php
	include('../footerVersionHandler.php');
	include('../arrayJSONHandler.php');

	$mobile_settings_config = "../config/mobile_settings.config";
	$mlkvplan_array_mobile_settings = DecodeJSONToArray($mobile_settings_config);

	if ($mlkvplan_array_mobile_settings->version != 'flash')
		$path = '"../html/modul1.html"';
	else
		$path = '"https://light.dsbcontrol.de/DSBlightWebsite/(S(wns2f3dhy5w21zzxuzomq1ph))/Homepage/PreProgram.aspx?ID=9de26a53-1a27-40ed-9ee1-82b65a6bcb38&ID2=d24a5dd7-48c6-4b27-8f79-464a62af12bf"';
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modul 2</title>
	<link rel="stylesheet" href="css/mobile_stylesheet.css" />
	<link rel="stylesheet" href="style/ios7UI.min.css" />
	<link rel="stylesheet" href="style/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head>
<body>
	<div data-role="page" id="modul1" data-theme="a" style="height='device-height';">
		<div data-role="header" data-position="inline" class="ui-bar">
  			<div id="container">
  				<div id="links"><a href="index.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-carat-l ui-btn-icon-left">Home</a></div>
  				<h1 style="padding-top: 13px;">Modul2</h1>
  				<div id="rechts"><a href='#' onclick='location.reload(true); return false;' data-iconpos="notext" class="ui-btn ui-btn-icon-left ui-icon-refresh">.</a></div>
  			</div>
		</div>
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
	    				<li class="ui-block-a"><a href="./modul1_mobile.php" data-icon="bars" class="ui-link ui-btn ui-icon-bars ui-btn-icon-top">Modul1</a></li>
	    				<li class="ui-block-b"><a href="./about_mobile.php" data-icon="info" class="ui-btn-active ui-link ui-btn ui-icon-info ui-btn-icon-top">Info</a></li>
	    				<li class="ui-block-c"><a href="./modul2_mobile.php" data-icon="bars" class="ui-link ui-btn ui-icon-bars ui-btn-icon-top" id="deactivated" style="color: lightgray;">Modul2</a></li>
	    			</ul>
    			</div>
        		<h1><? echo $version; ?></h1>
        	</div>
		</div>
	</div>
</body>
</html>