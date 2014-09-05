<?php
	$versionFile = @fopen("http://dl.dropboxusercontent.com/u/107727443/mlkvplaniosappVersion.txt/", "r");
		
	if ($versionFile != null)
		$version = fgets($versionFile);
	else
		$version = "???";	
?>