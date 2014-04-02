<?php
  $hostname = $_SERVER['HTTP_HOST'];
  $path = dirname($_SERVER['PHP_SELF']);

  if(isset($_REQUEST["fback"]))
      header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/onlineEditor.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (isset($_REQUEST["fedit"]) && !empty($_POST["textblock"]))
	{
    $datei = "datum.dat";

	  $fp = fopen($datei, "w+");

    fwrite($fp, $_POST["textblock"]);

	  fclose($fp); 

	  header("Location: http://hecki97.de.ht/mlkvplan/reader.php"); 
	}
  else
    $error_datum = "<span style ='color:#ff0000;font-style:bold'> Datum konnte nicht bearbeitet werden! </span>";
}
?>

<html>
  <head>
    <title>Datum bearbeiten</title>
   <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
   <meta name="viewport" content="height=device-height, initial-scale=1.25, maximum-scale=1.5, user-scalable=yes" />
  </head>
  <style>
  @font-face {
    font-family: 'notification';
    src: url('Walkway Bold.ttf');
    font-style: normal;
  }
  .notification {
    position: absolute;
    text-align: center; 
    font-size: 35;
    font-family: notification;
    text-shadow: 3px 3px 3px #555;
    width: 100%; 
  }

  @font-face {
      font-family: 'fonts';
      src: url('walkway.ttf');
      font-style: normal;
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
  <body>
      <div class="text">
        <h1>Datum eintragen:</h1>
          Format!: dd/mm/yy
          <form action='editor.php' method='post'>
            <input type='text' name='textblock'></input>
              <br><input type='submit' name='fedit' value='Datum bearbeiten'>
          </form>
          <br><form>
                  <input type="submit" name="fback" value="Zur Auswahl">
          </form>

        <div class="notification">
          <br><form action='editor.php'>
          <?php
            echo $error_datum;
          ?>
          </form>
        </div>
      </div>
    </body>
  </html>