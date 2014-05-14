<?php
	#HTMLs
	$html_modul1 = 'html/modul1.html';
	DeleteFile($html_modul1);
	$html_modul2 = 'html/modul2.html';
	DeleteFile($html_modul2);
	#Configs
	$key_config = "config/key.config";
	DeleteFile($key_config);
	$date_config = "config/date.config";
	DeleteFile($date_config);
	$settings_config = "config/settings.config";
	DeleteFile($settings_config);
	$mobile_settings_config = "config/mobile_settings.config";
	DeleteFile($mobile_settings_config);
	#Folder
	$folder_html = "html";
	DeleteFolder($folder_html);
	$folder_config = "config";
	DeleteFolder($folder_config);


	function DeleteFolder($folderName)
		{
			if(file_exists($folderName))
			{
				rmdir($folderName);
				return print('<span style ="color:#660000">Der Ordner "<u>'.$folderName.'</u>" wurde entfernt!</span><br>');
	    	}
	    	else
	    		return print('<span style ="color:#007236">Der Ordner "<u>'.$folderName.'</u>" konnte nicht entfernt werden!</span><br>');
		}

	function DeleteFile($varName)
	{
		if(file_exists($varName))
		{
			unlink($varName);
			return print('<span style ="color:#660000">Die Datei "<u>'.$varName.'</u>" wurde entfernt!</span><br>');
		}
		else
			return print('<span style ="color:#007236">Die Datei "<u>'.$varName.'</u>" konnte nicht entfernt werden!</span><br>');
	}
?>