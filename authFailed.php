<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include('./htmlHead.html'); ?>
<?php include('./_getVersionScript.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Authentication failed</title>
    </head>
    <body class="metro">
        <header>
          <nav class="navigation-bar dark fixed-top">
            <nav class="navigation-bar-content">
                <a href="./mlkVPlan.php" class="element"><span class="icon-home"></span> MLK-Vertretungsplan online</a>
         
                <span class="element-divider"></span>
                <button class="element brand no-phone" onclick="window.location.reload();"><span class="icon-spin"></span></button>
                <span class="element-divider"></span>

                <a href="./info.php" class="element brand place-right no-phone"><span class="icon-cog"></span></a>
                <span class="element-divider place-right"></span>
                <a class="element place-right no-phone">
                  <?php echo $version; ?>
                </a>
                <span class="element-divider place-right"></span>
                <a href="./login.php" class="element place-right no-phone">
                  <span class="icon-locked"></span> Zum Login!
                </a>
                <span class="element-divider place-right"></span>
            </nav>
          </nav>
        </header>

        <div class="container" style="text-align: center;">
            <h1>Sie besitzen derzeit keine Rechte auf diese Seite zuzugreifen!</h1>
            <h2>Bitte loggen Sie sich erneut ein!</h2>
            <form action="login.php">
                <input type="submit" name="zumLogin" value="Zum Login!"><br />
            </form>
        </div>
    </body>
</html>