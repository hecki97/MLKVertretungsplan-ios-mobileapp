<?php
	include('auth.php');

	if(!file_exists("html"))
		mkdir("html");

	if(!file_exists("data"))
		mkdir("data");

	$versionFile = fopen("http://dl.dropboxusercontent.com/u/107727443/mlkvplaniosappVersion.txt/", "r");
	$version = fgets($versionFile);

	$hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

	if(isset($_REQUEST["fback"]))
		header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/onlineEditor.php');

	if (file_exists('html/modul1.html'))
		$lastUpdate_modul1 = "Letztes Update: ".date ("d/m/y H:i:s.", filemtime("html/modul1.html"));

	if (file_exists('html/modul2.html'))
		$lastUpdate_modul2 = "Letztes Update: ".date ("d/m/y H:i:s.", filemtime("html/modul2.html"));

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if (!empty($_FILES['modul1']['name']))
		{
			if ($_FILES['modul1'] ['type'] == "text/html")
			{
				if ($_FILES['modul1'] ['size'] < 256000)
				{	
					if ($_FILES['modul1'] ['name'] == "modul1.html")
					{
						if (is_file($_FILES['modul1']['name'])) unlink($_FILES['modul1']['name']);
							move_uploaded_file($_FILES['modul1']['tmp_name'], "html/".$_FILES['modul1']['name']); 
			      			$upload_1 = ("<span style ='color:#04B404'>Die Datei ".$_FILES['modul1'] ['name']." wurde Erfolgreich nach html/".$_FILES['modul1']['name']." hochgeladen</span>");

			      			$datei_modul1 = "data/datum_modul1.dat";
	  						$fp_modul1 = fopen($datei_modul1, "w+");
    						fwrite($fp_modul1,date("d/m/y H:i:s."), filemtime("html/modul1.html"));
	  						fclose($fp_modul1);
					}
					else
						$error_upload1_4 = ("<span style ='color:#ff0000'>Bitte ".$_FILES['modul1']['name']."  'modul1.html' nennen!</span>");
				}
				else $error_upload1_3 = "<span style ='color:#ff0000'>Die Datei '".$_FILES['modul1']['name']."' darf maximal 250Kb groß sein!</span>";
			}
			else
				$error_upload1_2 = ("<span style ='color:#ff0000'>".$_FILES['modul1']['name']." ist keine '.html' Datei!</span>");
		}
		else
			$error_upload1_1 = ("<span style ='color:#ff0000'>Fehler beim Hochladen von 'modul1.html'</span>");

		if (!empty($_FILES['modul2']['name']))
		{
			if ($_FILES['modul2'] ['type'] == "text/html")
			{
				if ($_FILES['modul2'] ['size'] < 256000)
				{
					if ($_FILES['modul2'] ['name'] == "modul2.html")
					{
						if (is_file($_FILES['modul2']['name'])) unlink($_FILES['modul2']['name']);
							move_uploaded_file($_FILES['modul2']['tmp_name'], "html/".$_FILES['modul2']['name']);
			      			$upload_2 = ("<br><span style ='color:#04B404'>Die Datei ".$_FILES['modul2'] ['name']." wurde Erfolgreich nach html/".$_FILES['modul2']['name']." hochgeladen</span>");

			      			$datei_modul2 = "data/datum_modul2.dat";
	  						$fp_modul2 = fopen($datei_modul2, "w+");
    						fwrite($fp_modul2,date("d/m/y H:i:s."), filemtime("html/modul2.html"));
	  						fclose($fp_modul2);
					}
					else
						$error_upload2_4 = ("<br><span style ='color:#ff0000'>Bitte ".$_FILES['modul2']['name']." 'modul2.html' nennen!</span>");
				}
				else $error_upload2_3 = "<br><span style ='color:#ff0000'>Die Datei '".$_FILES['modul2']['name']."' darf maximal 250Kb groß sein!</span>";
			}
			else
				$error_upload2_2 = ("<br><span style ='color:#ff0000'>".$_FILES['modul2']['name']." ist keine '.html' Datei!</span>");
		}
		else
			$error_upload2_1 = ("<br><span style ='color:#ff0000'>Fehler beim Hochladen von 'modul2.html'</span>");
	}
?>

<html>
<head>
	<title> MLK-Vertretungsplan Modul1 HTML Upload </title>
	<meta name="viewport" content="height=device-height, initial-scale=0.75, maximum-scale=1.5, user-scalable=yes" />
	<link rel="stylesheet" type="text/css" href="css/default_stylesheet.css">
</head>

<body>
<div class="content_container">
	<div class="content">
		<div class="text">
			<h1>'.html' Dateien hochladen</h1>
			<form action="uploader.php" method="post" enctype="multipart/form-data"> 
				<h3>Hier 'modul1.html' hochladen!</h3>
				<input type="file" name="modul1">
				<br><?php echo $lastUpdate_modul1; ?>
				
				<br><br><h3>Hier 'modul2.html' hochladen!</h3>
				<input type="file" name="modul2">
				<br><?php echo $lastUpdate_modul2; ?>
				<br><br><input type="submit" value="Hochladen"> 
			</form>
			<form>
		        <input type="submit" name="fback" value="Zur Auswahl">
		    </form>
		<div class="notification">
		    <br><form action='uploader.php'>
		        <?php
		          echo $error_upload1_1,$error_upload1_2,$error_upload1_3,$error_upload1_4,$upload_1,$error_upload2_1,$error_upload2_2,$error_upload2_3,$error_upload2_4,$upload_2;
		        ?>
		      	</form>
	    </div>
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