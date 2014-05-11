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
 	<link href="icons/apple-touch-icon@60x60.png" rel="apple-touch-icon" sizes="60x60" />
    <link href="icons/apple-touch-icon@76x76.png" rel="apple-touch-icon" sizes="76x76" />
    <link href="icons/apple-touch-icon@120x120.png" rel="apple-touch-icon" sizes="120x120" />
    <link href="icons/apple-touch-icon@152x152.png" rel="apple-touch-icon" sizes="152x152" />
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
		<div data-role="header" data-position="inline">
			<h1>MLK Vertretungsplan<sup>mobile</sup></h1>
		</div>
		<br><ul data-role="listview" data-theme="a" data-divider-theme="a" class="ui-listview ui-group-theme-a">
			<li><a href="./modul1_mobile.php" class="ui-btn ui-btn-icon-right ui-icon-carat-r">
				<h3>Modul 1</h3>
				<p><strong>Unnötiger Fülltext. Einfach nicht beachten!</strong></p>
				<p><strong>
					<?php
						if(!empty($mlkvplan_array_modul->Datum_Modul1))
		                    CheckTimestamp(strtotime($mlkvplan_array_modul->Datum_Modul1),"modul1");
		                else
		                   	echo "Timestamp konnte nicht geprueft werden!";
                	?>
                </strong></p>
				<p class="ui-li-aside"><strong>Letztes Update: </strong>
					<?php
						if(!empty($mlkvplan_array_modul->Datum_Modul1))
		                	echo $mlkvplan_array_modul->Datum_Modul1;
		            	else
		                	echo "???";
                	?>
                </p>
			</a></li>
			
			<li><a href="./modul2_mobile.php" class="ui-btn ui-btn-icon-right ui-icon-carat-r">
				<h3>Modul 2</h3>
				<p><strong>Unnötiger Fülltext. Einfach nicht beachten!</strong></p>
				<p><strong>
					<?php
						if(!empty($mlkvplan_array_modul->Datum_Modul2))
		                    CheckTimestamp(strtotime($mlkvplan_array_modul->Datum_Modul2),"modul2");
		              	else
		                    echo "Timestamp konnte nicht geprueft werden!";
                	?>
                </strong></p>
				<p class="ui-li-aside"><strong>Letztes Update: </strong>
					<?php
						if(!empty($mlkvplan_array_modul->Datum_Modul2))
		                    echo $mlkvplan_array_modul->Datum_Modul2;
		                else
		                   	echo "???";
                	?>
                </p>
			</a></li>
		</ul><br>
		
		<div id="footer">
			<div data-role="footer">
				<div data-role="navbar" class="ui-navbar" role="navigation">
	    			<ul class="ui-grid-b">
	    				<li class="ui-block-a"><a href="./modul1_mobile.php" data-icon="bars" class="ui-link ui-btn ui-icon-bars ui-btn-icon-top" id="deactivated" style="color: lightgray;">Modul1</a></li>
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