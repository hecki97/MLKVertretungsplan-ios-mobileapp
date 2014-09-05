<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php include("$root/mlkvplan/res/html/htmlHead.html"); ?>
<?php include("$root/mlkvplan/res/php/_mlkVPlan.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>MLK-Vertretungsplan</title>
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
          <button href="./mlkVPlan.php" class="element"><span class="icon-home"></span> MLK-Vertretungsplan online<sup><?php echo $lang; ?></sup></button>
   
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

  <div class="container">
    <form action='mlkVPlan.php'>
      <?php if($_COOKIE["vPlan_version"] == "flash") : ?>
        <?php $version_sup = "flash"; ?>
      <?php else : ?>
        <?php $version_sup = "html"; ?>
      <?php endif; ?>

      <h1 style="text-align: center;"><?php echo $string['mlkvplan']['ueberschrift']; ?><sup><?php echo $version_sup; ?></sup></h1>
    </form>

    <table width="100%">
    <!-- 1. Zeile -->
      <tr>
      <!-- Check Datum Modul1 -->
        <th>
          <?php if($_COOKIE["vPlan_version"] == "html") : ?>
          <ul>
              <?php if(strtotime($row->modul1) != strtotime(date("d/m/y"))) : ?>
              <ul>
                <span style ='color:#B40404; font-size:25px'><?php echo $string['mlkvplan']['modul1.nicht.aktuell']; ?></span>
              </ul>
              <?php else : ?>
              <ul>
                <span style ='color:#007236; font-size:25px'><?php echo $string['mlkvplan']['modul1.aktuell']; ?></span>
              </ul>
              <?php endif; ?>
            </ul>     
          </ul>
          <?php else : ?>
            <span style ='font-size:25px'><?php echo $string['mlkvplan']['modul1.flash']; ?></span>
          <?php endif; ?>
        </th>
      <!-- Check Datum Modul2 -->
        <th>
          <?php if($_COOKIE["vPlan_version"] == "html") : ?>
          <ul>
              <?php if(strtotime($row->modul2) != strtotime(date("d/m/y"))) : ?>
              <ul>
                <span style ='color:#B40404; font-size:25px'><?php echo $string['mlkvplan']['modul2.nicht.aktuell']; ?></span>
              </ul>
              <?php else : ?>
              <ul>
                <span style ='color:#007236; font-size:25px'><?php echo $string['mlkvplan']['modul2.aktuell']; ?></span>
              </ul>
              <?php endif; ?>
            </ul>
          </ul>
          <?php else : ?>
            <span style ='font-size:25px'><?php echo $string['mlkvplan']['modul2.flash']; ?></span>
          <?php endif; ?>
        </th>
      </tr>
    
    <!-- 2. Zeile -->         
      <tr>
      <!-- Modul1 -->
        <td width="585" height="800" style="border-color:#000000; border-width:2px; border-style:solid;">
          <iframe src=<?php echo $path_modul1; ?> name="Vertretungsplan-Modul" scrolling="no" noresize frameborder=0  width="100%" height="100%" style="overflow: hidden;"></iframe>
        </td>
      <!-- Modul2 -->
        <td width="585" height="800" style="border-color:#000000; border-width:2px; border-style:solid; border-left-style:none;">
          <iframe src=<?php echo $path_modul2; ?> name="Vertretungsplan-Modul 2" scrolling="no" noresize frameborder=0  width="100%" height="100%" style="overflow: hidden;"></iframe>
        </td>
      </tr>
      
    <!-- 3. Zeile -->
      <tr>
      <!-- Check letztes Update Modul1 -->
        <th>
          <?php if($_COOKIE["vPlan_version"] == "html") : ?>
          <ul> 
              <h3>Letztes Update (Modul1): <?php echo $row->modul1; ?></h3>
          </ul>
          <?php else : ?>
            <h3>???</h3>
          <?php endif; ?>
        </th>
      <!-- Check letztes Update Modul2 -->
        <th>
          <?php if($_COOKIE["vPlan_version"] == "html") : ?>
          <ul> 
              <h3>Letztes Update (Modul2): <?php echo $row->modul2; ?></h3>
          </ul>
          <?php else : ?>
            <h3>???</h3>
          <?php endif; ?>
        </th>
      </tr>
    </table>
        
    <div style="margin: 0 auto; text-align: center;">
      <form>
        <?php if($_COOKIE["vPlan_version"] == "flash") : ?>
          <span style="font-size: 20px;"><b><?php echo $string['mlkvplan']['version']; ?></b><i>flash</i></span>
        <?php else : ?>
          <span style="font-size: 20px;"><b><?php echo $string['mlkvplan']['version']; ?></b><i>html</i></span>
        <?php endif; ?>
        <br> 
        <input type="submit" name="destroyCookie" value="<?php echo $string['global']['button.submit.auswahl']; ?>">
      </form>
    </div>
  </body>
</html>