<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include('./htmlHead.html'); ?>
<?php include('./_getVersionScript.php'); ?>
<?php $hostname = $_SERVER['HTTP_HOST']; ?>
<?php $path = dirname($_SERVER['PHP_SELF']); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>MLK-Vertretungsplan</title>
  </head>
  <body class="metro">
    <header>
      <nav class="navigation-bar dark fixed-top">
        <nav class="navigation-bar-content">
            <button href="#" class="element"><span class="icon-locked"></span> MLK-Vertretungsplan online</button>
     
            <span class="element-divider"></span>
            <button class="element brand no-phone" onclick="window.location.reload();"><span class="icon-spin"></span></button>
            <span class="element-divider"></span>

            <a href="./info.php" class="element brand place-right no-phone"><span class="icon-cog"></span></a>
            <span class="element-divider place-right"></span>
            <a class="element place-right no-phone">
              <?php echo $version; ?>
            </a>
            <span class="element-divider place-right"></span>
            <a href="#" class="element place-right no-phone">
              <span class="icon-locked"></span> Zum Login!
            </a>
            <span class="element-divider place-right"></span>
        </nav>
      </nav>
    </header>

    <div class="container" style="margin: 0 auto; text-align: center;">
      <h1>Version auswählen:</h1>
        <form action="index.php" method="post">
        
          <?php if(!isset($_COOKIE["vPlan_version"])) : ?>
          <ul>
            <?php if(isset($_POST['auswahl'])) : ?>
            <ul>
              <?php if($_POST['lifetime'] > 0 && $_POST['auswahl'] <= 999) : ?>
              <ul>
                <?php $time = $_POST['lifetime']; ?>
                <?php if($_POST['check'] == "html") : ?>
                <ul>
                  <?php setcookie("vPlan_version", "html", time()+(3600*$time)); ?>
                  <?php header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/mlkVPlan.php'); ?>
                </ul>
                <?php elseif($_POST['check'] == "flash") : ?>
                <ul>
                  <?php setcookie("vPlan_version", "flash", time()+(3600*$time)); ?>
                  <?php header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/mlkVPlan.php'); ?>
                </ul>
                <?php else : ?>
                  <script type="text/javascript">alert("Bitte eine Auswahl treffen!");</script>
                <?php endif; ?>
              </ul>
              <?php else : ?>
                <script type="text/javascript">alert("Bitte eine Zahl > 0 und <= 999 eingeben!");</script>
              <?php endif; ?>
            </ul>
            <?php endif; ?>
          </ul>
          <?php else : ?>
            <?php header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/mlkVPlan.php'); ?>
          <?php endif; ?>

        <table cellpadding="25" align="center">
          <tr>
            <td>
              <p><h3><input type="radio" name="check" value="html" />HTML</h3></p>
            </td>
            <td>
              <p><h3><input type="radio" name="check" value="flash" />flash</h3></p>
            </td>
          </tr>
        </table>

      <h2><b>Lebensdauer des Cookies:</b></h2>
          <p>
            <h3><span style='color:#F99E34; font-size: 25px;'>Achtung! Diese Webseite nutzt Cookies, um die von Ihnen getroffene Wahl zu speichern!</span></h3>
            <br />
            <h2>Lebensdauer:</h2>
            <input name="lifetime" type="number" maxlength="3" /> Stunde(n)<br/><br/>
            <input type="submit" name="auswahl" value="Zum Plan!" />
          </p>
        </form>
      </div>

  </body>
</html>