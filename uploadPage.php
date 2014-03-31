<?php include('auth.php'); ?>
<html>
<head>
	<title> MLK-Vertretungsplan Modul1 HTML Upload </title>
	<meta name="viewport" content="height=device-height, initial-scale=1.25, maximum-scale=1.5, user-scalable=yes" />
</head>
	<body>
		<h1>'.html' Dateien hochladen</h1>
		<form action="upload.php" method="post" enctype="multipart/form-data"> 
			<h3>Hier 'modul1.html' hochladen!</h3>
			<input type="file" name="modul1"><br>

			<h3>Hier 'modul2.html' hochladen!</h3>
			<input type="file" name="modul2"><br>
			<input type="submit" value="Hochladen"> 
		</form>
	
		<br><form action="http://hecki97.de.ht/mlkvplan/onlineEditor.php">
            	<input type="submit" value="Zur Auswahl">
            </form>
	</body>
</html>