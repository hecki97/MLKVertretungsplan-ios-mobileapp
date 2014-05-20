<?php
	function CheckTimestamp($modulTimestamp_name, $modul_name)
  	{
    	if ($modulTimestamp_name != strtotime(date("d/m/y")))
      		echo ("<span style ='color:#B40404;'> ".$modul_name." ist nicht aktuell!</span>");
    	else
      		echo ("<span style ='color:#007236;'> ".$modul_name." ist aktuell!</span>");
  	}
?>