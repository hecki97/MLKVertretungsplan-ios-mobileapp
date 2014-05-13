<?php
	include('auth.php');
	include('footerVersionHandler.php');
	include('fileChecker.php');
	include('buttonScript.php');
	
	$hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

	//Zum OnlineEditor
	forwardButton($hostname, $path, "fback", "onlineEditor.php");

	function Upload($modul_name)
	{
		if (!empty($_FILES[$modul_name]['name']))
		{
			if ($_FILES[$modul_name] ['type'] == "text/html")
			{
				if ($_FILES[$modul_name] ['size'] < 256000)
				{	
					if ($_FILES[$modul_name] ['name'] == $modul_name.".html")
					{
						if (is_file($_FILES[$modul_name]['name'])) unlink($_FILES[$modul_name]['name']);
							move_uploaded_file($_FILES[$modul_name]['tmp_name'], "html/".$_FILES[$modul_name]['name']); 
			      			$upload_1 = ("<span style ='color:#04B404'>Die Datei ".$_FILES[$modul_name] ['name']." wurde Erfolgreich nach html/".$_FILES[$modul_name]['name']." hochgeladen</span>");
					}
					else
						$error_upload1_4 = ("<span style ='color:#ff0000'>Bitte ".$_FILES[$modul_name]['name']."  'modul1.html' nennen!</span>");
				}
				else $error_upload1_3 = "<span style ='color:#ff0000'>Die Datei '".$_FILES[$modul_name]['name']."' darf maximal 250Kb groß sein!</span>";
			}
			else
				$error_upload1_2 = ("<span style ='color:#ff0000'>".$_FILES[$modul_name]['name']." ist keine '.html' Datei!</span>");
		}
		else
			$error_upload1_1 = ("<span style ='color:#ff0000'>Fehler beim Hochladen von '".$modul_name.".html'</span>");
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if (!empty($_FILES['modul1']['name']))
		{
			Upload($modul_name = 'modul1');
			$array['Datum_Modul1'] = date("d/m/y");
		}
		if (!empty($_FILES['modul2']['name']))
		{
			Upload($modul_name = 'modul2');
			$array['Datum_Modul2'] = date("d/m/y");
		}

		if (!empty($_FILES['modul1']['name']) || !empty($_FILES['modul2']['name']))
			EncodeArrayToJSON($date_config, $array);
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