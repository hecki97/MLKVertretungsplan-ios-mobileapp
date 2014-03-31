<?php
	if ($_FILES['modul1'] != null)
	{
		if ($_FILES['modul1'] ['type'] == "text/html")
		{
				if ($_FILES['modul1'] ['name'] == "modul1.html")
				{
					if (is_file($_FILES['modul1']['name'])) unlink($_FILES['modul1']['name']);
					move_uploaded_file($_FILES['modul1']['tmp_name'], "html/".$_FILES['modul1']['name']);
		      			echo ("Die Datei ".$_FILES['modul1'] ['name']." wurde Erfolgreich nach html/".$_FILES['modul1']['name']." hochgeladen");
				}
				else
					echo ("Bitte Datei 'modul1.html' nennen!");
		}
		else
			echo ("Bitte nur .html Dateien hochladen!");
	}
	else
		echo "Fehler beim hochladen der datei :(";

	if ($_FILES['modul2'] != null)
	{
		if ($_FILES['modul2'] ['type'] == "text/html")
		{
				if ($_FILES['modul2'] ['name'] == "modul2.html")
				{
					if (is_file($_FILES['modul2']['name'])) unlink($_FILES['modul2']['name']);
					move_uploaded_file($_FILES['modul2']['tmp_name'], "html/".$_FILES['modul2']['name']);
		      			echo ("Die Datei ".$_FILES['modul2'] ['name']." wurde Erfolgreich nach html/".$_FILES['modul2']['name']." hochgeladen");
				}
				else
					echo ("\nBitte Datei 'modul2.html' nennen!");
		}
		else
			echo ("\nBitte nur .html Dateien hochladen!");
	}
	else
		echo "\nFehler beim hochladen der datei :(";
?>