<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php include("$root/mlkvplan/res/html/htmlHead.html"); ?>
<?php include("$root/mlkvplan/res/php/_register.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
    <title>Registrierung</title>
</head>
<body class="metro">
  <header>
    <nav class="navigation-bar dark fixed-top">
      <nav class="navigation-bar-content">
          <a href="http://<?php echo $host; ?>/mlkvplan/mlkVPlan.php" class="element"><span class="icon-arrow-left-5"></span> MLK-Vertretungsplan online<sup><?php echo $lang; ?></sup></a>
   
          <span class="element-divider"></span>
          <button class="element brand no-phone no-tablet" onclick="window.location.reload();"><span class="icon-spin"></span></button>
          <span class="element-divider"></span>

          <a href="./info.php" class="element brand place-right no-phone no-tablet"><span class="icon-cog"></span></a>
          <span class="element-divider place-right"></span>
          <a class="element place-right no-phone no-tablet">
            <?php echo $version; ?>
          </a>
          <span class="element-divider place-right"></span>
          <a href="./login.php" class="element place-right no-phone no-tablet">
            <span class="icon-key"></span> <?php echo $string['global']['menu.login']; ?>
          </a>
          <span class="element-divider place-right"></span>
      </nav>
    </nav>
  </header>

<div class="container" style="text-align: center;">
  <h1><?php echo $string['register']['registrierung']; ?></h1>
    <form action="register.php" method="post">
      <h3><?php echo $string['register']['daten']; ?></h3>
      
      <table cellpadding="2" align="center">
        <tr>
          <th>
            <span style ='font-size:15px'><?php echo $string['register']['username']; ?></span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="text" name="username" /></span>
          </th>
        </tr>
        <tr>
          <th>
            <span style ='font-size:15px'><?php echo $string['register']['password']; ?></span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="password" name="passwort" /></span>
          </th>
        </tr>
        <tr>
          <th>
            <span style ='font-size:15px'><?php echo $string['register']['password.wdh']; ?></span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="password" name="passwort2" /></span>
          </th>
        </tr>
        <tr>
          <th>
            <span style ='font-size:15px'><?php echo $string['register']['einladungscode']; ?></span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="text" name="einladungscode" /></span>
          </th>
        </tr>
      </table>
      <br><input type="submit" name="uregister" value="Registrieren">
      <br><br><input type="submit" name="plan" value="Zum Plan!">
             
      <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
      <ul>
        <?php $username = $_POST["username"]; ?>
        <?php $passwort = $_POST["passwort"]; ?>
        <?php $passwort2 = $_POST["passwort2"]; ?>
        <?php $einladungscode = $_POST["einladungscode"]; ?>

        <?php if($passwort != $passwort2 || $username == "" || $passwort == "" || $einladungscode == "") : ?>
        <ul>
          <script type="text/javascript">alert("<?php echo $string['register']['javascript.alert.felder']; ?>");</script> 
          <?php exit; ?>
        </ul>
        <?php endif; ?> 
        <?php $passwort = md5($passwort); ?>

        <?php $result = mysql_query("SELECT id FROM login WHERE username LIKE '$username'"); ?>
        <?php $menge = mysql_num_rows($result); ?>

        <?php if($menge == 0) : ?> 
        <ul>
          <?php $einladungscode = trim($einladungscode); ?>
          <?php $abfrage_key = "SELECT * FROM `key`"; ?>
          <?php $ergebnis_key = mysql_query($abfrage_key); ?>
          <?php $row_key = mysql_fetch_object($ergebnis_key); ?>
          <?php if (md5($einladungscode)==$row_key->md5) : ?>
          <ul>
            <?php $eintrag = "INSERT INTO login (username, passwort) VALUES ('$username', '$passwort')"; ?>
            <?php $eintragen = mysql_query($eintrag); ?>
          </ul>
          <?php else : ?>
          <ul>
            <script type="text/javascript">alert("<?php echo $string['register']['javascript.alert.einladungscode']; ?>");</script>
          </ul>
          <?php endif; ?>
          <?php if(@$eintragen == true) : ?>
          <ul>
            <?php echo $string['register']['alert.succes']; ?><b><?php echo $username; ?></b><?php echo $string['register']['alert.succes.2']; ?> <a href="./login.php"><?php echo $string['global']['menu.login']; ?></a> 
          </ul>
          <?php else : ?> 
          <ul>
            <script type="text/javascript">alert("<?php echo $string['register']['javascript.alert.speicherfehler']; ?>");</script>
          </ul>
          <?php endif; ?>
        </ul>
        <?php else : ?> 
        <ul> 
          <script type="text/javascript">alert("<?php echo $string['register']['javascript.alert.bereits.vorhanden']; ?>");</script>
        </ul>
        <?php endif; ?>
      </ul>
      <?php endif; ?>
    </form>
  </div>
</body>
</html>