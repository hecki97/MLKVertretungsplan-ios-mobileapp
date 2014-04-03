<?php
	include('auth.php');

	$hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

		if(isset($_REQUEST["fupload"]))
			header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/uploader.php');

		if(isset($_REQUEST["fshow"]))
			header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/reader.php');

		if(isset($_REQUEST["logout"]))
			header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/logout.php');

		if(isset($_REQUEST["fopen"]))
			header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');

	$datei = "user.dat";
	    if (file_exists($datei))
	    {
		    $fp = fopen($datei, "r");
			$user = ("Willkommen, ".fgets($fp)."");
		}
		else
			$error_user = "<span style ='color:#ff0000'>Die '".$datei."' fehlt. Bitte erneut einloggen!</span>";

	$date = "<span style = 'font-size:50px'>".date('d F Y')."</span>";
?>
<html>
<head>
	<title>MLK Vertretungsplan Online Editor</title>
	<meta name="viewport" content="height=device-height, initial-scale=1, maximum-scale=1.5, user-scalable=yes" />
</head>
<style>
  @font-face {
      font-family: 'fonts';
      src: url('walkway.ttf');
      font-style: normal;
  }

  @font-face {
  	font-family: 'notification';
    src: url('Walkway Bold.ttf');
    font-style: normal;
  }
  .notification {
  	position: absolute;
    text-align: center; 
    font-size: 25;
    font-family: notification;
    text-shadow: 3px 3px 3px #555;
    width: 100%; 
  }

  .text { 
     position: absolute;
     text-align: center; 
     font-size: 25;
     font-family: fonts;
     text-shadow: 1px 1px 1px #555;
     top: 25px;
     width: 95%; 
  }
</style>

<script type="text/javascript">
function UR_Start() 
{
	UR_Nu = new Date;
	UR_Indhold = showFilled(UR_Nu.getHours()) + ":" + showFilled(UR_Nu.getMinutes()) + ":" + showFilled(UR_Nu.getSeconds());
	document.getElementById("ur").innerHTML = UR_Indhold;
	setTimeout("UR_Start()",1000);
}
function showFilled(Value) 
{
	return (Value > 9) ? "" + Value : "0" + Value;
}

</script>

<body onload="UR_Start()">
	<div class="text">
	<h1>MLK VK Vertretungsplan Online Editor</h1>
	
	<h2><form action='onlineEditor.php'>
			<?php
				echo $user,$error_user;
			?>
	</form></h2>

		'.html' dateien hochladen:
			<form action='onlineEditor.php'>
	    		<input type="submit" name="fupload" value="Daten hochladen">
	    	</form><br>
		Aktuelles Datum anzeigen:
			<form>
	    		<input type="submit" name="fshow" value="Datum anzeigen">
	    	</form><br>
		<form action='logout.php'>
				<input type="submit" name"logout" value="Ausloggen">
		</form>
		<form>
	    	<input type="submit" name="fopen" value="Zum Plan">
		</form>

		<h2><font id="ur" size="30"></font></h2>
		<h2><?php echo $date; ?></h2>
	</div>
</body>
</html>