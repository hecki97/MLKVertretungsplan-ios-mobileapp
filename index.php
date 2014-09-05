<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php $host = $_SERVER['SERVER_NAME']; ?>
<?php include("$root/mlkvplan/res/html/htmlHead.html"); ?>
<?php include("$root/mlkvplan/res/php/_loadLangFiles.php"); ?>
<?php include("$root/mlkvplan/res/php/_getVersionScript.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Index</title>
    <script type="text/javascript"><!--

    if (screen.width < 480) {
      if (confirm('Wollen sie zu der mobilen Seite weitergeleitet werden?') == true)
        window.location.href = "./mobile/index.php";
    }  
    //-->
    </script>
  </head>
  <body class="metro">
    <header>
      <nav class="navigation-bar dark fixed-top">
        <nav class="navigation-bar-content">
            <button href="#" class="element"><span class="icon-locked"></span> MLK-Vertretungsplan online<sup><?=$lang; ?></sup></button>
     
            <span class="element-divider"></span>
            <button class="element brand no-phone no-tablet" onclick="window.location.reload();"><span class="icon-spin"></span></button>
            <span class="element-divider"></span>

            <a href="./info.php" class="element brand place-right no-phone no-tablet"><span class="icon-cog"></span></a>
            <span class="element-divider place-right"></span>
            <a class="element place-right no-phone no-tablet">
              <?=$version; ?>
            </a>
            <span class="element-divider place-right"></span>
            <a href="#" class="element place-right no-phone no-tablet">
              <span class="icon-locked"></span> <?=$string['global']['menu.login']; ?>
            </a>
            <span class="element-divider place-right"></span>
        </nav>
      </nav>
    </header>

    <div class="container" style="margin: 0 auto; text-align: center;">
      <h1><?=$string['index']['ueberschrift']; ?></h1>
        <form action="index.php" method="post">
        
          <?php if(!isset($_COOKIE["vPlan_version"])) : ?>
          <ul>
            <?php if(isset($_POST['auswahl'])) : ?>
            <ul>
              <?php if($_POST['lifetime'] > 0 && $_POST['auswahl'] <= 999) : ?>
              <ul>
                <?php $time = $_POST['lifetime']; ?>
                <?php if(@$_POST['check'] == "html") : ?>
                <ul>
                  <?php setcookie("vPlan_version", "html", time()+(3600*$time)); ?>
                  <?php header("Location: http://$host/mlkvplan/mlkvplan.php"); ?>
                </ul>
                <?php elseif(@$_POST['check'] == "flash") : ?>
                <ul>
                  <?php setcookie("vPlan_version", "flash", time()+(3600*$time)); ?>
                  <?php header("Location: http://$host/mlkvplan/mlkvplan.php"); ?>
                </ul>
                <?php else : ?>
                  <script type="text/javascript">alert("<?=$string['index']['javascript.alert.auswahl']; ?>");</script>
                <?php endif; ?>
              </ul>
              <?php else : ?>
                <script type="text/javascript">alert("<?=$string['index']['javascript.alert.lebendszeit']; ?>");</script>
              <?php endif; ?>
            </ul>
            <?php endif; ?>
          </ul>
          <?php else : ?>
            <?php header("Location: http://$host/mlkvplan/mlkvplan.php"); ?>
          <?php endif; ?>

        <table cellpadding="25" align="center">
          <tr>
            <td>
              <p><h3><input type="radio" name="check" value="html"/>HTML</h3></p>
            </td>
            <td>
              <p><h3><input type="radio" name="check" value="flash"/>flash</h3></p>
            </td>
          </tr>
        </table>

      <h2><b><?=$string['index']['lebendsdauer.cookie']; ?></b></h2>
          <p>
            <h3><span style='color:#F99E34; font-size: 25px;'><?=$string['index']['warnung']; ?></span></h3>
            <br />
            <h2><?=$string['index']['lebendsdauer']; ?></h2>
            <input name="lifetime" type="number" maxlength="3"/> <?=$string['index']['stunden']; ?><br/><br/>
            <input type="submit" name="auswahl" value="<?=$string['index']['button.submit.speichern']; ?>" />
          </p>
        </form>
      </div>

  </body>
</html>