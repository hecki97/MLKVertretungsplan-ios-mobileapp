<?php
	include(dirname(__FILE__)."/_auth.php");
	include(dirname(__FILE__)."/_loadLangFiles.php");
	include(dirname(__FILE__)."/_checkDataBase.php");
	include(dirname(__FILE__)."/_getVersionScript.php");

	$abfrage = "SELECT modul1, modul2 FROM datum"; 
	$ergebnis = mysql_query($abfrage); 
	$row = mysql_fetch_object($ergebnis);

	// KEY VARIABLES
	$valid_exts = array("text/html", "html"); // array of valid file extensions
	$max_file_size = 250; // file size in kb
	$upload_dir = dirname(__FILE__)."/../upload/"; // directory to upload to with trailing slash
	//

	function check_url($url){
		global $valid_exts;
		
		$url_parts = parse_url($url);
		$path_info = pathinfo($url_parts['path']);
		if(in_array($path_info['extension'],$valid_exts)){
			return true;	
		} else {
			return false;	
		}
	}

	function remote_file_size($file){
		if(isset($file)){
			$ch = curl_init($file);
			curl_setopt($ch, CURLOPT_NOBODY, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		
			$data = curl_exec($ch);
			curl_close($ch);
		
			if (preg_match('/Content-Length: (\d+)/', $data, $matches)) {
		
				// Contains file size in bytes
				$contentLength = (int)$matches[1];
				return $contentLength;
			} else {
				return false;	
			}
		} else {
			return false;	
		}
	}

	function run_upload_form(){
		include(dirname(__FILE__)."/_loadLangFiles.php");

		global $valid_exts;
		global $max_file_size;
		global $upload_dir;
		
		$files_hdd = array();
		$files_url = array();
		$filenames = array(); $filetypes = array(); $file_tmp = array(); $filesizes = array();
		$files_hdd = $_FILES['files_hdd'];
		$files_url = $_POST['files_url'];
		$errors = array();
		$uploaded = array();
		$return = "";
		if(is_dir($upload_dir)){
			if(is_writable($upload_dir)){
				// first let's remove all blank urls
				if(count($files_url) > 0){
					foreach($files_url as $id => $url){
						if($url == "http://"){
							unset($files_url[$id]);	
						}
						if(!empty($files_hdd["name"][$id])){
							// remove url file if hdd is set
							unset($files_url[$id]);	
						}
					}
				}
				if(count($files_hdd) > 0){
				$filenames = $files_hdd["name"];
				$filetypes = $files_hdd["type"];
				$file_tmp  = $files_hdd["tmp_name"];
				$filesizes = $files_hdd["size"];
				if(count($filenames) > 0){
					foreach($filenames as $id => $filename){
						if($filename && $filetypes[$id] && $file_tmp[$id] && $filesizes[$id]){
							if(in_array($filetypes[$id],$valid_exts)){
								if((round($filesizes[$id]/1024,"2")) <= $max_file_size) {
									
									if ($id == 0)
									{
										$filename = "modul1.html";
										$eintrag = "UPDATE datum SET `modul1`='".date("d/m/y")."'";
            							$eintragen = mysql_query($eintrag);
									}
									else
									{
										$filename = "modul2.html";
										$eintrag = "UPDATE datum SET `modul2`='".date("d/m/y")."'";
            							$eintragen = mysql_query($eintrag);
									}

									if(move_uploaded_file($file_tmp[$id],$upload_dir.$filename)){
										// file has been uploaded, success!	
										$uploaded[$id] = $string['labels']['l.file'].($id+1).": <strong>".$filename."</strong>@".(round($filesizes[$id]/1024,"2")).$string['labels']['l.upload.succes'];
									}
									else {
										// Unable to upload.
										$errors[$id] = $string['labels']['l.file'].($id+1).": <strong>".$filename."</strong>".$string['labels']['l.upload.error'];
									}
								} else {
									$errors[$id] = $string['labels']['l.file'].($id+1).": <strong>".$filename."</strong>".$string['labels']['l.upload.error.max.filesize'].$max_file_size.$string['labels']['l.upload.error.max.filesize2'].(round($filesizes[$id]/1024,"2"))." KB.";
								}
							} else {
								$errors[$id] = $string['labels']['l.file'].($id+1).": <strong>".$filename."</strong>".$string['labels']['l.upload.error.file.type'].$filetypes[$id].".";	
							}
						}
					}
				}
			}
				if(count($files_url) > 0){
					foreach($files_url as $id => $url){
						$url = trim($url);
						$filename = basename($url);
						if(!empty($filename) && $filename != "http://" && check_url($url)){
							$file_open = fopen($url,"r");
							if($file_open){
								$filesize = round((remote_file_size($url)/1024),"2");
								$filetype = end(explode(".",strtolower($filename)));
								if(in_array($filetype,$valid_exts)){
									if($filesize <= $max_file_size){
										$newfile = fopen($upload_dir . $filename, "wb"); // creating new file on local server
										if($newfile){
											while(!feof($file_open)){
												// Write the url file to the directory.
												fwrite($newfile,fread($file_open,1024 * 8),1024 * 8); // write the file to the new directory at a rate of 8kb/sec. until we reach the end.
											}
											
											if ($id == 0)
											{
												$filename = "modul1.html";
												$eintrag = "UPDATE datum SET `modul1`='".date("d/m/y")."'";
		            							$eintragen = mysql_query($eintrag);
											}
											else
											{
												$filename = "modul2.html";
												$eintrag = "UPDATE datum SET `modul2`='".date("d/m/y")."'";
		            							$eintragen = mysql_query($eintrag);
											}

											// upload from url successfully
											$uploaded[$id] = $string['labels']['l.file'].($id+1).": <strong>".$filename."</strong>@".$filesize.$string['labels']['l.upload.succes'];
										}
									} else {
										$errors[$id] = $string['labels']['l.file'].($id+1).": <strong>".$filename."</strong>".$string['labels']['l.upload.error.max.filesize'].$max_file_size.$string['labels']['l.upload.error.max.filesize.2'].$filesize." KB.";
									}
								} else {
									$errors[$id] = $string['labels']['l.file'].($id+1).": <strong>".$filename."</strong>".$string['labels']['l.upload.error.file.type']."(".$filetype.").";	
								}
							}
							else {
								// Unable to upload.
								$errors[$id] = $string['labels']['l.file'].($id+1).": ".$filename.$string['labels']['l.upload.error.reading'];
							}
						} else {
							$errors[$id] = $string['labels']['l.file'].($id+1).": '".$filename."'".$string['labels']['l.upload.error.url'];
						}
					}
				}
				if((count($files_hdd) > 0) || (count($files_url) > 0)){
					if(count($uploaded) > 0){
						$return .= '<span style="color:green">';
						$return .= implode('<br/>',$uploaded);	
						$return .= '</span>';
					}
					$return .= '<p>&nbsp;</p>';
					if(count($errors) > 0){
						$return .= '<span style="color:red">';
						$return .= implode('<br/>',$errors);
						$return .= '</span>';	
					}
					return $return;
				} else {
					return $string['labels']['l.upload.error.no.files'];	
				}
			} else {
				return $string['labels']['l.upload.error.upload.dir'];	
			}
		} else {
			return $string['labels']['l.upload.error.locate.upload.dir'].' "'.$upload_dir.'".';	
		}
	}

	$upload_result = "";

	if(isset($_REQUEST["submit"])){
		$upload_result = run_upload_form();
	}
?>