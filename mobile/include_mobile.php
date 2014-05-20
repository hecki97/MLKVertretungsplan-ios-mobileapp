<?php
	include('../arrayJSONHandler.php');
	include('../footerVersionHandler.php');
	include('../checkTimestamp.php');

	$date_config = "../config/date.config";
	$mobile_settings_config = "../config/mobile_settings.config";
	$mlkvplan_array_modul = DecodeJSONToArray($date_config);
	$mlkvplan_array_mobile_settings = DecodeJSONToArray($mobile_settings_config);
?>