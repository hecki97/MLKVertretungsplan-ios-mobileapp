<?php
    include('auth.php');

    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

    if(isset($_REQUEST["fback"]))
        header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/onlineEditor.php');
?>
<html>
<head>
    <title>Datum darstellen</title>
    <meta name="viewport" content="height=device-height, initial-scale=1.25, maximum-scale=1.5, user-scalable=yes" />
</head>
<style>
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
    <h1>Aktuelles Datum:</h1>
    <?php
            $datei = "datum.dat";
            $fp = fopen($datei, "r");
            echo "<span style ='font-size:20px'>Aktuelles Datum: ".fgets($fp)."</span>";
    ?>
    <form>
        <br><input type="submit" name="fback" value="Zur Auswahl">
    </form>
</div>

</body>
</html>