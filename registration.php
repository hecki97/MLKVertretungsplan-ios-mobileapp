<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php include("$root/mlkvplan/res/html/htmlHead.html"); ?>
<?php include("$root/mlkvplan/res/php/_registration.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
    <title>Registrierung</title>
</head>
<body class="metro">
  <header>
    <nav class="navigation-bar dark fixed-top">
      <nav class="navigation-bar-content">
          <a href="http://<?=$host; ?>/mlkvplan/mlkVPlan.php" class="element"><span class="icon-arrow-left-5"></span> MLK-Vertretungsplan online<sup><?=$lang; ?></sup></a>
   
          <span class="element-divider"></span>
          <button class="element brand no-phone no-tablet" onclick="window.location.reload();"><span class="icon-spin"></span></button>
          <span class="element-divider"></span>

          <a href="./info.php" class="element brand place-right no-phone no-tablet"><span class="icon-cog"></span></a>
          <span class="element-divider place-right"></span>
          <a class="element place-right no-phone no-tablet">
            <?=$version; ?>
          </a>
          <span class="element-divider place-right"></span>
          <a href="./login.php" class="element place-right no-phone no-tablet">
            <span class="icon-key"></span> <?=$string['global']['menu.login']; ?>
          </a>
          <span class="element-divider place-right"></span>
      </nav>
    </nav>
  </header>

<div class="container" style="text-align: center;">
  <h1><?=$string['registration']['registrierung']; ?></h1>
    <form action="registration.php" method="post">
      <h3><?=$string['registration']['daten']; ?></h3>
      
      <table cellpadding="2" align="center">
        <tr>
          <th>
            <span style ='font-size:15px'><?=$string['registration']['username']; ?></span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="text" name="username" /></span>
          </th>
        </tr>
        <tr>
          <th>
            <span style ='font-size:15px'><?=$string['registration']['password']; ?></span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="password" name="passwort" /></span>
          </th>
        </tr>
        <tr>
          <th>
            <span style ='font-size:15px'><?=$string['registration']['password.wdh']; ?></span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="password" name="passwort2" /></span>
          </th>
        </tr>
        <tr>
          <th>
            <span style ='font-size:15px'><?=$string['registration']['einladungscode']; ?></span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="text" name="einladungscode" /></span>
          </th>
        </tr>
      </table>
      <br><input type="submit" name="uregister" value="<?=$string['global']['button.submit.register']; ?>">
      <br><br><input type="submit" name="plan" value="<?=$string['global']['button.submit.plan']; ?>">
             
      <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
      <ul>
        <?php $username = $_POST["username"]; ?>
        <?php $passwort = $_POST["passwort"]; ?>
        <?php $passwort2 = $_POST["passwort2"]; ?>
        <?php $einladungscode = $_POST["einladungscode"]; ?>

        <?php if($passwort != $passwort2 || $username == "" || $passwort == "" || $einladungscode == "") : ?>
        <ul>
          <script type="text/javascript">alert("<?=$string['registration']['javascript.alert.felder']; ?>");</script> 
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
            <script type="text/javascript">alert("<?=$string['registration']['javascript.alert.einladungscode']; ?>");</script>
          </ul>
          <?php endif; ?>
          <?php if(@$eintragen == true) : ?>
          <ul>
            <?=$string['registration']['alert.succes']; ?><b><?=$username; ?></b><?=$string['registration']['alert.succes.2']; ?> <a href="./login.php"><?=$string['global']['menu.login']; ?></a> 
          </ul>
          <?php else : ?> 
          <ul>
            <script type="text/javascript">alert("<?=$string['registration']['javascript.alert.speicherfehler']; ?>");</script>
          </ul>
          <?php endif; ?>
        </ul>
        <?php else : ?> 
        <ul> 
          <script type="text/javascript">alert("<?=$string['registration']['javascript.alert.bereits.vorhanden']; ?>");</script>
        </ul>
        <?php endif; ?>
      </ul>
      <?php endif; ?>
    </form>
  </div>
</body>
</html>