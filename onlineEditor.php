<?php include('auth.php'); ?>
<html>
<head>
	<title>MLK Vertretungsplan Online Editor</title>
	<meta name="viewport" content="height=device-height, initial-scale=1, maximum-scale=1.5, user-scalable=yes" />
</head>
<body>
	<h1>MLK VK Vertretungsplan Online Editor</h1>
	
	<h2>
		<?php
		$username = $_GET["user"];
		echo ("Willkommen, ".$username);
		?>
	</h2>

	'.html' dateien hochladen:
		<form action="http://hecki97.de.ht/mlkvplan/uploadPage.php">
    		<input type="submit" value="Daten hochladen">
    	</form><br>
	Aktuelles Datum bearbeiten:
		<form action="http://hecki97.de.ht/mlkvplan/dateEditor.html">
    		<input type="submit" value="Datum bearbeiten">
    	</form><br>
	Aktuelles Datum anzeigen:
		<form action="http://hecki97.de.ht/mlkvplan/reader.php">
    		<input type="submit" value="Datum anzeigen">
    	</form><br>
	<form action="http://hecki97.de.ht/mlkvplan/logout.php">
		<input type="submit" value="Ausloggen">
	</form>
	<form action="http://hecki97.de.ht/mlkvplan/index.php">
    	<input type="submit" value="Zum Plan">
	</form>
</body>
</html>