<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include(dirname(__FILE__)."/res/php/_settings.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
  <head>
    <?php include(dirname(__FILE__)."/res/html/htmlHead.html"); ?>
    <title>Einstellungen</title>
  </head>
  <body class="metro">
  <header>
    <nav class="navigation-bar dark fixed-top">
      <nav class="navigation-bar-content">
        <a href="http://<?=$host; ?>/mlkvplan/onlineEditor.php" class="element"><span class="icon-arrow-left-5"></span> <?=$string['links']['a.online.editor']; ?><sup><?=$lang; ?></sup></a>
       
        <span class="element-divider"></span>
        <button class="element brand no-phone no-tablet" onclick="window.location.reload();"><span class="icon-spin"></span></button>
        <span class="element-divider"></span>

        <a href="./info.php" class="element brand place-right no-phone no-tablet"><span class="icon-cog"></span></a>
        <span class="element-divider place-right"></span>
        <a class="element place-right no-phone no-tablet"><?=$version; ?></a>
        <span class="element-divider place-right"></span>
        <a class="element place-right no-phone no-tablet"><span class="icon-unlocked"></span> <?=$_SESSION["username"]; ?></a>
        <span class="element-divider place-right"></span>
      </nav>
    </nav>
  </header>

  <div class="container" style="text-align: center;">
    <h1><?=$string['labels']['l.settings']; ?></h1>     
    <!-- Einladungscode -->
      <h2><?=$string['labels']['l.invitation.code']; ?></h2>
      <h3><span style="color:#F99E34;"><?=$string['labels']['l.invitation.code.warning']; ?></span></h3>
      <form action="settings.php" method="post">
        <span style = 'font-style:italic; font-size:35px;'>
          <?php if(!empty($gen_key)) : ?>
            <?=$gen_key; ?>
          <?php else : ?>
            <?="???"; ?>
          <?php endif; ?>
        </span>
      </form>

        <form action="settings.php" method="post">
          <?php if($row->aktiviert != "true") : ?>
            <?php $show_confirm_genKey = 'onclick="return show_confirm_genKey();"'; ?>
          <?php else : ?>
            <?php $show_confirm_genKey = ''; ?>
          <?php endif; ?>
          <script>
            function show_confirm_genKey()
            {
                return confirm("<?=$string['javascript.alert']['j.registration.not.activated']; ?>");
            }
          </script>
          <input type="submit" <?=$show_confirm_genKey; ?> name="random" value="<?=$string['buttons']['b.gen']; ?>"><br><br>

          <!-- Registrierung -->
              <h2><?=$string['labels']['l.registration.de/activate']; ?></h2>
              <span style="text-align:left; margin-right:25px; vertical-align:middle;"><input type="radio" name="check" value="True"> <?=$string['buttons']['b.activate']; ?></span>
              <span style="text-align:right; margin-left:25px; vertical-align:middle;"><input type="radio" name="check" value="False"> <?=$string['buttons']['b.deactivate']; ?><br></span>
              <h3><b><?=$string['labels']['l.current']; ?></b> <i><?=$echo_registrierung; ?></i></h3><br>
              <input type="submit" name="auswahl" value="<?=$string['buttons']['b.save']; ?>">
          </form>      
      </div>
  </body>
</html>