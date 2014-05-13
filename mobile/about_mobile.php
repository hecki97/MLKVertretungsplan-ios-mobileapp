<?php
	include('../arrayJSONHandler.php');
	include('../footerVersionHandler.php');
	include('checkTimestamp.php');

	$date_config = "../config/date.config";
	$mobile_settings_config = "../config/mobile_settings.config";
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
				<form action="about_mobile.php" method="post">
					<h2>MLK Vplan Version:</h2>
		            <div id="container">
		            	<div data-role="fieldcontain">
    						<fieldset data-role="controlgroup">
						        <input type="radio" name="check" id="radio-choice-1" value="html" checked="checked" />
						        <label for="radio-choice-1">HTML <i>(empfohlen)</i></label>

						        <input type="radio" name="check" id="radio-choice-2" value="flash" />
						        <label for="radio-choice-2">flash</label><br>
						    </fieldset>
						</div>
					</div>
		            	<?php
		            	if(isset($_POST['auswahl'])) {
		                	if($_POST['check'] == "html") {
		                    	$check_html = "<span style='color:#FFBF00; font-style:italic; font-size:25px;'>html!</span>";
		                    	$array['version'] = "html";
		                    	EncodeArrayToJSON($mobile_settings_config, $array);
		                  	}
		                  	if($_POST['check'] == "flash") {
		                    	$check_flash = "<span style='color:#FFBF00; font-style:italic; font-size:25px;'>flash!</span>";
		                     	$array['version'] = "flash";
		                      	EncodeArrayToJSON($mobile_settings_config, $array);
		                  	}
		              }
		         
		                $mlkvplan_array_mobile_settings = DecodeJSONToArray($mobile_settings_config);

		                if (empty($check_html) && empty($check_flash))
		                  echo "<span style='font-size:15px;'><b>Aktuelle Version:</b> <i>".$mlkvplan_array_mobile_settings->version."</i></span>";
		                else if (!empty($check_html))
		                  echo $check_html;
		                else if (!empty($check_flash))
		                  echo $check_flash;
		              ?>
		             <input type="submit" name="auswahl" value="Speichern">
				<h1><a href="https://github.com/hecki97/MLKVertretungsplan-ios-mobileapp">Source Code(Github)</a></h1>
				<h1>Powered by:</h1>
				<img src="jqueryMobile.png"><br>
				<h1>© 2014 - hecki97</h1>
				</form>
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