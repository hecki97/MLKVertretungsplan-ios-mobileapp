<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);

	include_once("$root/mlkvplan/res/php/_checkBrowserLang.php");

	$allowed_langs = array ('de', 'en', 'la');
	$lang = lang_getfrombrowser ($allowed_langs, 'de', null, false);

	if ($lang == 'de')
		$string = json_decode(file_get_contents("$root/mlkvplan/res/lang/de_DE.lang"), true);
	else if ($lang == 'en')
		$string = json_decode(file_get_contents("$root/mlkvplan/res/lang/en_US.lang"), true);
	else
		$string = json_decode(file_get_contents("$root/mlkvplan/res/lang/la_LA.lang"), true);
?>