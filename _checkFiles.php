<?php
	include_once('./_arrayToJSONScript.php');

	#Folder
	$folder_html = "html";
	CreateFolder($folder_html);
	$folder_config = "config";
	CreateFolder($folder_config);
	#HTMLs
	$html_modul1 = 'html/modul1.html';
	CreateFile($html_modul1);
	$html_modul2 = 'html/modul2.html';
	CreateFile($html_modul2);
	#Configs
	$key_config = "config/key.config";
	CreateFile($key_config);
	$date_config = "config/date.config";
	CreateFile($date_config);
	$settings_config = "config/settings.config";
	CreateFile($settings_config);

	$mlkvplan_array_settings = DecodeJSONToArray($settings_config);
	if(empty($mlkvplan_array_settings->Registrierung_aktiviert))
    {
    	$array['Registrierung_aktiviert'] = "Aktiviert";
        EncodeArrayToJSON($settings_config, $array);
    }

    $mlkvplan_array_key = DecodeJSONToArray($key_config);
    if(empty($mlkvplan_array_key->Key))
    {
    	$array['Key'] = md5('000');
    	EncodeArrayToJSON($key_config, $array);
    }

	function CreateFolder($folderName)
	{
		if(!file_exists($folderName))
		{
			mkdir($folderName);
			return print('<p><span style ="color:#F99E34">Der Ordner "<u>'.$folderName.'</u>" wurde erstellt!</span><br/></p>');
    	}
    	else
    		return print('<p><span style ="color:#609000">Der Ordner "<u>'.$folderName.'</u>" existiert!</span><br/></p>');
	}

	function CreateFile($varName)
	{
		if(file_exists($varName))
			return print('<p><span style ="color:#609000">Die Datei "<u>'.$varName.'</u>" existiert!</span><br/></p>');
		else
		{
			$file_open = fopen($varName, "w");
			fclose($file_open);
			return print('<p><span style ="color:#F99E34">Die Datei "<u>'.$varName.'</u>" wurde erstellt!</span><br/></p>');
		}

	}
?>