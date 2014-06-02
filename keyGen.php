<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include('./htmlHead.html'); ?>
<?php include('./_keyGen.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
      <title>Einstellungen</title>
  </head>
  <body class="metro">
  <header>
    <nav class="navigation-bar dark fixed-top">
      <nav class="navigation-bar-content">
        <a href="./mlkVPlan.php" class="element"><span class="icon-arrow-left-5"></span> MLK-Vertretungsplan online</a>
       
        <span class="element-divider"></span>
        <button class="element brand no-phone" onclick="window.location.reload();"><span class="icon-spin"></span></button>
        <span class="element-divider"></span>

        <a href="./info.php" class="element brand place-right no-phone"><span class="icon-cog"></span></a>
        <span class="element-divider place-right"></span>
        <a class="element place-right no-phone">
          <?php echo $version; ?>
        </a>
        <span class="element-divider place-right"></span>
        <a class="element place-right no-phone">
        <span class="icon-unlocked"></span> <?php echo $_SESSION["username"]; ?>
        </a>
        <span class="element-divider place-right"></span>
      </nav>
    </nav>
  </header>

  <div class="container" style="margin: 0 auto; text-align: center;">
    <h1>Einstellungen:</h1>
      <h2><span style="color:#F99E34;">Achtung dieser Code verfaellt sobald die Seite verlassen wird!</span></h2>
      <form action="keyGen.php" method="post">
        <input type="submit" name="uarandom" value="Einladungscode generieren">
        <br />
        <h2>Einladungscode:</h2>
        <span style = 'font-style:italic; font-size:35px;'>
          <?php if(!empty($key)) : ?>
            <?php echo $key; ?>
          <?php else : ?>
            <?php echo "???"; ?>
          <?php endif; ?>
        </span>
        <br><br><input type="submit" name="fback" value="Zu den Einstellungen">
      </form>
  </div>
  </body>
</html>