<?php
	include('auth.php');
	include('footerVersionHandler.php');
	include('fileChecker.php');
	include('forwardScript.php');
	
	$hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

	//Upload
	forwardButton($hostname, $path, "fupload", "uploader.php");
	//Settings
	forwardButton($hostname, $path, "fsettings", "settings.php");
	//ZumPlan
	forwardButton($hostname, $path, "fopen", "index.php");
	//Logout
	forwardButton($hostname, $path, "logout", "logout.php");

	$date = "<span style = 'font-size:50px'>".date('d F Y')."</span>";
?>
<html>
<head>
	<title>MLK Vertretungsplan Online Editor</title>
	<meta name="viewport" content="height=device-height, initial-scale=0.5, maximum-scale=1.5, user-scalable=yes" />
	<link rel="stylesheet" type="text/css" href="css/default_stylesheet.css">
</head>

<script type="text/javascript">
function UR_Start() 
{
	UR_Nu = new Date;
	UR_Indhold = showFilled(UR_Nu.getHours()) + ":" + showFilled(UR_Nu.getMinutes()) + ":" + showFilled(UR_Nu.getSeconds());
	document.getElementById("ur").innerHTML = UR_Indhold;
	setTimeout("UR_Start()",1000);
}
function showFilled(Value) 
{
	return (Value > 9) ? "" + Value : "0" + Value;
}

</script>

<body onload="UR_Start()">
<div class="content_container">
	<div class="content">
		<div class="text">
		<h1>MLK VK Vertretungsplan Online Editor</h1>
		
		<h2><form action='onlineEditor.php'>
				<?php
					if(!empty($user))
						echo $user;
					else if (!empty($error_user))
						echo $error_user;
				?>
		</form></h2>

			Vertretungsplan aktualisieren:
				<form action='onlineEditor.php'>
		    		<input type="submit" name="fupload" value="Klick hier!">
		    	</form><br>
		    Einstellungen:
				<form>
		    		<input type="submit" name="fsettings" value="Klick hier!">
		    	</form><br>
			<form action='logout.php'>
					<input type="submit" name"logout" value="Ausloggen">
			</form>
			<form>
		    	<input type="submit" name="fopen" value="Zum Plan">
			</form>

			<h2><font id="ur" size="30"></font></h2>
			<h2><?php echo $date; ?></h2>
		</div>
	</div>
</div>

<div class="footer_container">
	<div class="footer">
		<span style = "font-family:fonts;text-align:center;">
			<b><? echo $version; ?></b>
		</span>
	</div>
</div>

</body>
</html>