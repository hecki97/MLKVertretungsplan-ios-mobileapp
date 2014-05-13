<?php
	function forwardButton($hostname, $path, $buttonName, $fileName)
	{
		if(isset($_REQUEST[$buttonName]))
			header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/'.$fileName);
	}
?>