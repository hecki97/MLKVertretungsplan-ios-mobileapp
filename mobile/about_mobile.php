<?php include './include_mobile.php'; ?>
<html>
	<head>
		<!-- Wichtig für iOS -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../icons/apple-touch-icon@60x60.png" rel="apple-touch-icon" sizes="60x60" />
		<link href="../icons/apple-touch-icon@76x76.png" rel="apple-touch-icon" sizes="76x76" />
		<link href="../icons/apple-touch-icon@120x120.png" rel="apple-touch-icon" sizes="120x120" />
		<link href="../icons/apple-touch-icon@152x152.png" rel="apple-touch-icon" sizes="152x152" />
		
		<meta charset="utf-8">
		<title>MLK Vertretungsplan mobile</title>
		<link rel="stylesheet" href="../css/mobile_stylesheet.css" />
		<link rel="stylesheet" href="../lib/jquery_mobile/style/ios7UI.min.css" />
		<link rel="stylesheet" href="../lib/jquery_mobile/style/jquery.mobile.icons.min.css" />
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
				<!-- flash/HTML Switch -->
					<form action="about_mobile.php" method="post">
						<h2>MLK Vplan Version:</h2>
			            <div id="container">
			            	<div data-role="fieldcontain">
	    						<fieldset data-role="controlgroup">
							        <input type="radio" name="check" id="radio-choice-1" value="html" />
							        <label for="radio-choice-1">HTML <i>(empfohlen)</i></label>

							        <input type="radio" name="check" id="radio-choice-2" value="flash" />
							        <label for="radio-choice-2">flash</label><br>
							    </fieldset>
							</div>
						</div>
			            <?php if(isset($_POST['auswahl'])) : ?>
			            <ul>
			                <?php if($_POST['check'] == "html") : ?>
			               	<ul>
			                    <?php if(isset($_COOKIE["version"])) : ?>
			                   	<ul>
			                    	<?php unset($_COOKIE["version"]); ?>
			                    	<?php setcookie("version", null); ?>
			                    	<script type="text/javascript">window.location.reload();</script>
			                   	</ul>
			                   	<?php endif; ?>
			                </ul>
			                <?php endif; ?>
			                <?php if($_POST['check'] == "flash") : ?>
			                <ul>
			                  	<?php unset($_COOKIE["version"]); ?>
			                    <?php setcookie("version", "flash"); ?>
			                   	<script type="text/javascript">window.location.reload();</script>
			                </ul>
			                <?php endif; ?>
			                <?php if ($_POST['check'] == "") : ?>
			                	<b>Bitte eine Version auswählen!</b>
			                <? endif; ?>
			            </ul>
			        	<?php endif; ?>

					    <?php if(isset($_COOKIE["version"])) : ?>
							<b>Aktuelle Version:</b><i>flash</i>
						<?php else : ?>
							<b>Aktuelle Version:</b><i>html</i>
						<?php endif; ?>
			            <input type="submit" name="auswahl" value="Speichern">

				<!-- Sonstiges -->
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