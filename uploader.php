<?php
	include('auth.php');
	include('footerVersionHandler.php');
	include('fileChecker.php');
	include_once('arrayJSONHandler.php');

	$hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

	if(isset($_REQUEST["fback"]))
		header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/onlineEditor.php');

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

			      			$mlkVPlanArray['Datum_Modul1'] = date("d/m/y H:i:s.");
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

			      			$mlkVPlanArray['Datum_Modul2'] = date("d/m/y H:i:s.");
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

	EncodeArrayToJSON($date_config, $mlkVPlanArray);
	}
?>

<html>
<head>
	<title> MLK-Vertretungsplan HTML Upload </title>
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
				<br><?php
						$mlkvplan_array_modul1 = DecodeJSONToArray($date_config);

						if(!empty($mlkvplan_array_modul1->Datum_Modul1))
							echo "Letztes Update: ".$mlkvplan_array_modul1->Datum_Modul1;
						else
							echo "???";
					?>
				
				<br><br><h3>Hier 'modul2.html' hochladen!</h3>
				<input type="file" name="modul2">
				<br><?php
						$mlkvplan_array_modul2=DecodeJSONToArray($date_config);

						if(!empty($mlkvplan_array_modul2->Datum_Modul2))
							echo "Letztes Update: ".$mlkvplan_array_modul2->Datum_Modul2;
						else
							echo "???";
					?>
				<br><br><input type="submit" value="Hochladen"> 
			</form>
			<form>
		        <input type="submit" name="fback" value="Zur Auswahl">
		    </form>
		<div class="notification">
		    <br><form action='uploader.php'>
		        <?php
		          if (!empty($error_upload1_1))
		          	echo $error_upload1_1;
		          else if (!empty($error_upload1_2))
		          	echo $error_upload1_2;
		          else if (!empty($error_upload1_3))
		          	echo $error_upload1_3;
		          else if (!empty($error_upload1_4))
		          	echo $error_upload1_4;
		          else if (!empty($upload_1))
		          	echo $upload_1;
		          else if (!empty($error_upload2_1))
		          	echo $error_upload2_1;
		          else if (!empty($error_upload2_2))
		          	echo $error_upload2_2;
		          else if (!empty($error_upload2_3))
		          	echo $error_upload2_3;
		          else if (!empty($error_upload2_4))
		          	echo $error_upload2_4;
		          else if (!empty($upload_2))
		          	echo $upload_2;
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