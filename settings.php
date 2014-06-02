<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include('./htmlHead.html'); ?>
<?php include('./_settings.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
  <head>
      <title>Einstellungen</title>
  </head>
  <body class="metro">
  <header>
    <nav class="navigation-bar dark fixed-top">
      <nav class="navigation-bar-content">
        <a href="./mlkVPlan.php" class="element"><span class="icon-arrow-left-5"></span> MLK-Vertretungsplan online</a>
       
        <span class="element-divider"></span>
        <button class="element brand" onclick="window.location.reload();"><span class="icon-spin"></span></button>
        <span class="element-divider"></span>

        <a href="./info.php" class="element brand place-right"><span class="icon-cog"></span></a>
        <span class="element-divider place-right"></span>
        <a class="element place-right">
          <?php echo $version; ?>
        </a>
        <span class="element-divider place-right"></span>
        <a class="element place-right">
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
        <form action="./keyGen.php" method="post">
          <?php if($mlkvplan_array_settings->Registrierung_aktiviert == "Deaktiviert") : ?>
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
          <input type="submit" <?php echo $show_confirm_genKey; ?> value="Einladungscode generieren!">
        </form>

          <!-- Registrierung -->
            <form action="settings.php" method="post">
              <h2>Registrierung De/Aktivieren:</h2>
                <span style="text-align:left; margin-right:25px; vertical-align:middle;"><input type="radio" name="check" value="True"> Aktivieren</span>
                <span style="text-align:right; margin-left:25px; vertical-align:middle;"><input type="radio" name="check" value="False"> Deaktivieren<br></span>
                <?php if(isset($_POST['auswahl'])) : ?>
                <ul>
                    <?php if($_POST['check'] == "True") : ?>
                    <ul>
                        <?php $array['Registrierung_aktiviert'] = "Aktiviert"; ?>
                        <?php EncodeArrayToJSON($settings_config, $array); ?>
                        <script type="text/javascript">window.location.reload();</script>
                    </ul>
                    <?php elseif($_POST['check'] == "False") : ?>
                    <ul>
                        <?php $array['Registrierung_aktiviert'] = "Deaktiviert"; ?>
                        <?php EncodeArrayToJSON($settings_config, $array); ?>
                        <script type="text/javascript">window.location.reload();</script>
                    </ul>
                    <?php else : ?>
                        <span style='color:#FFBF00; font-style:italic; font-size:25px;'>Bitte eine Auswahl treffen!</span>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
                <span style='font-size:35px;'>
                  <b>Aktuell:</b> <i><?php echo $mlkvplan_array_settings->Registrierung_aktiviert; ?></i>
                </span>
                <br>
                <input type="submit" name="auswahl" value="Speichern">
            </form>

              <h2>File Checker:</h2>
                <form action="settings.php" method="post">
                  <div style="font-size:20px;">
                    <?php if(isset($_POST['checkFiles'])) : ?>
                    <ul>
                      <?php include('./_checkFiles.php'); ?>
                      <br>
                    </ul>
                    <?php endif; ?>
                  </div>
                  <input type="submit" name="checkFiles" value="Check Files!">
                </form>
                
              <!-- <?php
                //if(isset($_POST['checkFiles'])) {
                //  include('fileChecker.php');
                //}
              ?> -->

              <h2>Lokale Daten zuruecksetzen:</h2>
               <div style="font-size: 15px;">
               <?php
                if(isset($_POST['reset'])) {
                  include('unlinkScript.php');
                  include('fileChecker.php');
                }
              ?>
              </div>
              <input type="submit" name="reset" value="Reset">
            </form>
            <br>
            <br>
            <form>
              <input type="submit" name="fback" value="Zur Übersicht!">
            </form>
      </div>
  </body>
</html>