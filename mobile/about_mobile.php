<?php
	include('../arrayJSONHandler.php');
	include('../footerVersionHandler.php');
	include('checkTimestamp.php');

	$date_config = "../config/date.config";
	$mlkvplan_array_modul = DecodeJSONToArray($date_config);
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="MLK Vertretungsplan" content="iOS title">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>MLK Vertretungsplan mobile</title>
	<link rel="stylesheet" href="css/mobile_stylesheet.css" />
	<link rel="stylesheet" href="style/ios7UI.min.css" />
	<link rel="stylesheet" href="style/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head>
<body>
	<div data-role="page" data-theme="a">
		<div data-role="header" data-position="inline" class="ui-bar">
  			<div id="container">
  				<div id="links"><a href="index.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-carat-l ui-btn-icon-left">Home</a></div>
  				<h1 style="padding-top: 13px;">About MLK Vplan</h1>
  			</div>
		</div>
		<div role="main" class="ui-content">
			<div id="center" style="padding-top: 10px; text-align: center;">
				<h1><a href="https://github.com/hecki97/MLKVertretungsplan-ios-mobileapp">Source Code(Github)</a></h1>
				<h1>Powered by:</h1>
				<img src="jqueryMobile.png"><br>
				<h1>© 2014 - hecki97</h1>
			</div>
		</div>
		<div id="footer">
			<div data-role="footer">
	        	<h1><? echo $version; ?></h1>
	        </div>
	    </div>
	</div>
</body>
</html>