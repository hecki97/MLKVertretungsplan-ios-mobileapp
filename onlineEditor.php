<?php
	include('auth.php');

	$hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

		if(isset($_REQUEST["fupload"]))
			header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/uploader.php');

		if(isset($_REQUEST["fshow"]))
			header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/reader.php');

		if(isset($_REQUEST["logout"]))
			header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/logout.php');

		if(isset($_REQUEST["fopen"]))
			header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');

		if(isset($_REQUEST["fsettings"]))
			header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/settings.php');

	if(!file_exists("data"))
		mkdir("data");

	$versionFile = fopen("http://dl.dropboxusercontent.com/u/107727443/mlkvplaniosappVersion.txt/", "r");
	$version = fgets($versionFile);

	$datei = "data/usrTMP.dat";
	    if (file_exists($datei))
	    {
		    $fp = fopen($datei, "r");
			$user = ("Willkommen, ".fgets($fp));
		}
		else
			$error_user = "<span style ='color:#ff0000'>Die '".$datei."' fehlt. Bitte erneut einloggen!</span>";

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
					echo $user,$error_user;
				?>
		</form></h2>

			'.html' dateien hochladen:
				<form action='onlineEditor.php'>
		    		<input type="submit" name="fupload" value="Daten hochladen">
		    	</form><br>
			Letztes Update anzeigen:
				<form>
		    		<input type="submit" name="fshow" value="Version anzeigen">
		    	</form><br>
		    Einstellungen bearbeiten:
				<form>
		    		<input type="submit" name="fsettings" value="Einstellungen">
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