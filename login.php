<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include('./htmlHead.html'); ?>
<?php include('./_login.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
 <head>
    <title>Sicherer Bereich</title>
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
          <a href="#" class="element place-right">
            <span class="icon-key"></span> Zum Login!
          </a>
          <span class="element-divider place-right"></span>
      </nav>
    </nav>
  </header>

  <div class="container" style="text-align: center;">
    <h1>Login Informationen eingeben:</h1>
    <form action="login.php" method="post">
      <table cellpadding="2" align="center">
        <tr>
          <th>
            <span style ='font-size:15px'>Benutzername:</span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="text" name="username" /></span>
          </th>
        </tr>
        <tr>
          <th>
            <span style ='font-size:15px'>Passwort:</span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="password" name="password" /></span>
          </th>
        </tr>
      </table>
      <br/><input type="submit" value="Anmelden" />
      <br/><input type="submit" name="register" value="Account erstellen" />
      <br/><br/><br/><input type="submit" name="fback" value="Zum Plan!" />
    </form>
  </div>

 </body>
</html>