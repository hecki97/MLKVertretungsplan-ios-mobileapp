<?php
	include('auth.php');

	if(!file_exists("html"))
		mkdir("html");

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
					if ($_FILES['modul1'] ['name'] == "modul1.html")
					{
						if (is_file($_FILES['modul1']['name'])) unlink($_FILES['modul1']['name']);
						move_uploaded_file($_FILES['modul1']['tmp_name'], "html/".$_FILES['modul1']['name']);
			      			$upload_1 = ("<span style ='color:#04B404'>Die Datei ".$_FILES['modul1'] ['name']." wurde Erfolgreich nach html/".$_FILES['modul1']['name']." hochgeladen</span>");
					}
					else
						$error_upload1_3 = ("<span style ='color:#ff0000'>Bitte ".$_FILES['modul1']['name']."  'modul1.html' nennen!</span>");
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
					if ($_FILES['modul2'] ['name'] == "modul2.html")
					{
						if (is_file($_FILES['modul2']['name'])) unlink($_FILES['modul2']['name']);
						move_uploaded_file($_FILES['modul2']['tmp_name'], "html/".$_FILES['modul2']['name']);
			      			$upload_2 = ("<br><span style ='color:#04B404'>Die Datei ".$_FILES['modul2'] ['name']." wurde Erfolgreich nach html/".$_FILES['modul2']['name']." hochgeladen</span>");
					}
					else
						$error_upload2_3 = ("<br><span style ='color:#ff0000'>Bitte ".$_FILES['modul2']['name']." 'modul2.html' nennen!</span>");
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
	<meta name="viewport" content="height=device-height, initial-scale=1.25, maximum-scale=1.5, user-scalable=yes" />
</head>
<style>
  @font-face {
      font-family: 'fonts';
      src: url('walkway.ttf');
      font-style: normal;
  }

  @font-face {
  	font-family: 'notification';
    src: url('Walkway Bold.ttf');
    font-style: normal;
  }
  .notification {
  	position: absolute;
    text-align: center; 
    font-size: 35;
    font-family: notification;
    text-shadow: 3px 3px 3px #555;
    width: 100%; 
  }
  
  .text { 
     position: absolute;
     text-align: center; 
     font-size: 25;
     font-family: fonts;
     text-shadow: 1px 1px 1px #555;
     top: 25px;
     width: 95%; 
  }
</style>
<body>
	<div class="text">
		<h1>'.html' Dateien hochladen</h1>
		<form action="uploader.php" method="post" enctype="multipart/form-data"> 
			<h3>Hier 'modul1.html' hochladen!</h3>
			<input type="file" name="modul1"><br>

			<h3>Hier 'modul2.html' hochladen!</h3>
			<input type="file" name="modul2"><br>
			<br><input type="submit" value="Hochladen"> 
		</form>
		<form>
	        <input type="submit" name="fback" value="Zur Auswahl">
	    </form>
	<div class="notification">
	    <br><form action='uploader.php'>
	        <?php
	          echo $error_upload1_1,$error_upload1_2,$error_upload1_3,$upload_1,$error_upload2_1,$error_upload2_2,$error_upload2_3,$upload_2;
	        ?>
	      	</form>
    </div>
    </div>
	</body>
</html>