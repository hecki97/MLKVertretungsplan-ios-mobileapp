<?php
	function EncodeArrayToJSON($FileName, $array) {
		return file_put_contents($FileName, json_encode($array));
	}

	function DecodeJSONToArray($FileName) {
		return json_decode(file_get_contents($FileName));
	}
?>