<?php
	include_once('arrayJSONHandler.php');

	print("<div style='text-align:left;'>_DebugLog!_<br>");

	$data_user_dat = "data/user.dat";
	CreateFile($data_user_dat);
	#HTMLs
	$html_modul1 = 'html/modul1.html';
	CreateFile($html_modul1);
	$html_modul2 = 'html/modul2.html';
	CreateFile($html_modul2);
	$data_usrTMP_dat = "data/usrTMP.dat";
	CreateFile($data_usrTMP_dat);
	#Configs
	$key_config = "config/key.config";
	CreateFile($key_config);
	$date_config = "config/date.config";
	CreateFile($date_config);
	//test
	$settings_config = "config/settings.config";
	CreateFile($settings_config);
	#Folder
	$folder_html = "html";
	CreateFolder($folder_html);
	$folder_config = "config";
	CreateFolder($folder_config);

    if(empty($data_user_dat))
    	header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/register.php');

	if (file_exists($data_usrTMP_dat))
	{
		$fp = fopen($data_usrTMP_dat, "r");
		$user = ("Willkommen, ".fgets($fp));
		fclose($fp);
	}
	else
		$error_user = '<span style ="color:#ff0000">Die "'.$data_usrTMP_dat.'" fehlt. Bitte erneut einloggen!</span>';

	if(empty($key_config))
    {
    	$array['Key'] = md5('000');
    	EncodeArrayToJSON($key_config, $array);
    }

    if(empty($settings_config))
    {
    	$array['Registrierung'] = "true";
    	EncodeArrayToJSON($settings_config, $array);
    }

	function CreateFolder($folderName)
	{
		if(!file_exists($folderName))
		{
			mkdir($folderName);
			return print('<span style ="color:#660000">Der Ordner "<u>'.$folderName.'</u>" wurde erstellt!</span><br>');
    	}
    	else
    		return print('<span style ="color:#007236">Der Ordner "<u>'.$folderName.'</u>" existiert!</span><br>');
	}

	function CreateFile($varName)
	{
		if(file_exists($varName))
			return print('<span style ="color:#007236">Die Datei "<u>'.$varName.'</u>" existiert!</span><br>');
		else
		{
			$file_open = fopen($varName, "w");
			fclose($file_open);
			return print('<span style ="color:#660000">Die Datei "<u>'.$varName.'</u>" wurde erstellt!</span><br>');
		}

	}

	print("_End!_</div><br>");
?>