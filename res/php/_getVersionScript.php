<?php
	$versionFile = @fopen("https://dl.dropboxusercontent.com/u/107727443/mlkvplan_assets/mlkvplan_version.txt", "r");
	if ($versionFile != null)
		$version = fgets($versionFile);
	else
		$version = "???";
?>