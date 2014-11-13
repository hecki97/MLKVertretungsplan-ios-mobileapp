<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include(dirname(__FILE__)."/res/php/_index.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include(dirname(__FILE__)."/res/html/htmlHead.html"); ?>
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
          <button href="./mlkvplan.php" class="element"><span class="icon-home"></span> <?=$string['labels']['l.mlkvplan']; ?><sup><?=$lang; ?></sup></button>
   
          <span class="element-divider"></span>
          <button class="element brand no-phone no-tablet" onclick="window.location.reload();"><span class="icon-spin"></span></button>
          <span class="element-divider"></span>

          <a href="./info.php" class="element brand place-right no-phone no-tablet"><span class="icon-cog"></span></a>
          <span class="element-divider place-right"></span>
          <a class="element place-right no-phone no-tablet"><?=$version; ?></a>
          <span class="element-divider place-right"></span>
          <a href="./login.php" class="element place-right no-phone no-tablet"><span class="icon-key"></span> <?=$string['links']['a.menu.login']; ?></a>
          <span class="element-divider place-right"></span>
      </nav>
    </nav>
  </header>

  <div class="container">
    <h1><?=$string['labels']['l.mlkvplan']; ?><sup><?=$version_sup; ?></sup></h1>
    
    <table width="100%">
    <!-- 1. Zeile -->
      <tr>
      <!-- Check Datum Modul1 -->
        <th><h2><?=CheckDatum("$row->modul1", "Modul1"); ?></h2></th>
      <!-- Check Datum Modul2 -->
        <th><h2><?=CheckDatum("$row->modul2", "Modul2"); ?></h2></th>
      </tr>
    <!-- 2. Zeile -->         
      <tr>
      <!-- Modul1 -->
        <td width="25%" height="800" style="border-color:#000000; border-width:2px; border-style:solid;"><iframe src=<?=$path_modul1; ?> name="Vertretungsplan-Modul" scrolling="no" noresize frameborder=0  width="100%" height="100%" style="overflow: hidden;"></iframe></td>
      <!-- Modul2 -->
        <td width="25%" height="800" style="border-color:#000000; border-width:2px; border-style:solid; border-left-style:none;"><iframe src=<?=$path_modul2; ?> name="Vertretungsplan-Modul 2" scrolling="no" noresize frameborder=0  width="100%" height="100%" style="overflow: hidden;"></iframe></td>
      </tr>
    <!-- 3. Zeile -->
      <tr>
        <th><input class="index" type="submit" onClick="parent.location='./index.php'" value="flash" style="margin-top: 5px; margin-bottom: 5px; width: 100%" /></th>
        <th><input class="index" type="submit" onClick="parent.location='./index.php?do=html'" value="HTML" style="margin-top: 5px; margin-bottom: 5px; width: 100%"/></th>
      </tr>
    </table>
  </body>
</html>