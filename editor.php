<?php
$datei = "datum.dat";

 $fp = fopen($datei, "w+");

if (isset($_REQUEST["fedit"]))
{
  fwrite($fp, $_POST["textblock"]);

  fclose($fp); 

  header("Location: http://hecki97.de.ht/mlkvplan/reader.php"); 
}
?>
  