<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php include("$root/mlkvplan/res/html/htmlHead.html"); ?>
<?php include("$root/mlkvplan/res/php/_settings.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
  <head>
      <title>Einstellungen</title>
  </head>
  <body class="metro">
  <header>
    <nav class="navigation-bar dark fixed-top">
      <nav class="navigation-bar-content">
        <a href="http://<?php echo $host; ?>/mlkvplan/onlineEditor.php" class="element"><span class="icon-arrow-left-5"></span> Online-Editor<sup><?php echo $lang; ?></sup></a>
       
        <span class="element-divider"></span>
        <button class="element brand no-phone no-tablet" onclick="window.location.reload();"><span class="icon-spin"></span></button>
        <span class="element-divider"></span>

        <a href="./info.php" class="element brand place-right no-phone no-tablet"><span class="icon-cog"></span></a>
        <span class="element-divider place-right"></span>
        <a class="element place-right no-phone no-tablet">
          <?php echo $version; ?>
        </a>
        <span class="element-divider place-right"></span>
        <a class="element place-right no-phone no-tablet">
        <span class="icon-unlocked"></span> <?php echo $_SESSION["username"]; ?>
        </a>
        <span class="element-divider place-right"></span>
      </nav>
    </nav>
  </header>

  <div class="container" style="text-align: center;">
    <h1>Einstellungen:</h1>
            
      <!-- Einladungscode -->
        <h2>Einladungscode:</h2>
        <h3><span style="color:#F99E34;">Achtung dieser Code wird nicht mehr angezeigt, wenn die Seite verlassen wird!</span></h3>
      <form action="settings.php" method="post">
        <span style = 'font-style:italic; font-size:35px;'>
          <?php if(!empty($gen_key)) : ?>
            <?php echo $gen_key; ?>
          <?php else : ?>
            <?php echo "???"; ?>
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
                return confirm("Achtung! Die Registrierung ist nicht aktiviert!");
            }
          </script>
          <input type="submit" <?php echo $show_confirm_genKey; ?> name="uarandom" value="Einladungscode generieren!">
        </form><br><br>

          <!-- Registrierung -->
            <form action="settings.php" method="post">
              <h2>Registrierung De/Aktivieren:</h2>
                <span style="text-align:left; margin-right:25px; vertical-align:middle;"><input type="radio" name="check" value="True"> Aktivieren</span>
                <span style="text-align:right; margin-left:25px; vertical-align:middle;"><input type="radio" name="check" value="False"> Deaktivieren<br></span>
                <?php if(isset($_POST['auswahl'])) : ?>
                <ul>
                    <?php if(@$_POST['check'] == "True") : ?>
                    <ul>
                        <?php $eintragen = mysql_query("UPDATE `registrierung` SET aktiviert = 'true' WHERE 1"); ?>
                        <script type="text/javascript">window.location.reload();</script>
                    </ul>
                    <?php elseif(@$_POST['check'] == "False") : ?>
                    <ul>
                        <?php $eintragen = mysql_query("UPDATE `registrierung` SET aktiviert = 'false' WHERE 1"); ?>
                        <script type="text/javascript">window.location.reload();</script>
                    </ul>
                    <?php else : ?>
                        <script type="text/javascript">alert("Bitte eine Auswahl treffen!");</script>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
                  <h3><b>Aktuell:</b> <i><?php echo $echo_registrierung; ?></i></h3>
                <br>
                <input type="submit" name="auswahl" value="Speichern">
            </form>
                
            </form>
            <br>
            <br>
            <form>
              <input type="submit" name="fback" value="Zur Übersicht!">
            </form>
      </div>
  </body>
</html>