<?php include('auth.php'); ?>
<html>
<head>
    <title>Datum darstellen</title>
    <meta name="viewport" content="height=device-height, initial-scale=1.25, maximum-scale=1.5, user-scalable=yes" />
</head>
<body>

 <div class="text">
    <h1>Aktuelles Datum:</h1>
    <?php
            $datei = "datum.dat";
            $fp = fopen($datei, "r");
            echo 'Aktuelles Datum: '.fgets($fp);
    ?>
    

<br><form action="http://hecki97.de.ht/mlkvplan/onlineEditor.php">
        <input type="submit" value="Zur Auswahl">
    </form>

<form action="http://hecki97.de.ht/mlkvplan/index.php">
    <input type="submit" value="Zum Plan">
</form>

</body>
</html>