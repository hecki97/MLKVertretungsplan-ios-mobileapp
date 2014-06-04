<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include('./mobileHtmlHead.html'); ?>
<?php include('../_getVersionScript.php'); ?>
<?php $hostname = $_SERVER['HTTP_HOST']; ?>
<?php $path = dirname($_SERVER['PHP_SELF']); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>MLK-Vertretungsplan mobile</title>
        <link rel="stylesheet" href="../css/mobile_stylesheet.css" />
    </head>
    <body class="metro" style="text-align: center;">
        <header>
          <nav class="navigation-bar dark fixed-top">
            <nav class="navigation-bar-content">
                <a class="element"><span class="icon-locked"></span> MLK-Vertretungsplan<sup>???</sup></a>
            </nav>
          </nav>
        </header>

        <h1>Version auswählen:</h1>
        <form action="mobile_cookie.php" method="post">
          <?php if(!isset($_COOKIE["mobile_version"])) : ?>
          <ul>
            <?php if(isset($_POST['auswahl'])) : ?>
            <ul>
                <?php if($_POST['check'] == "html") : ?>
                <ul>
                  <?php setcookie("mobile_version", "html"); ?>
                  <?php header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php'); ?>
                </ul>
                <?php elseif($_POST['check'] == "flash") : ?>
                <ul>
                  <?php setcookie("mobile_version", "flash"); ?>
                  <?php header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php'); ?>
                </ul>
                <?php else : ?>
                  <script type="text/javascript">alert("Bitte eine Auswahl treffen!");</script>
                <?php endif; ?>
            </ul>
            <?php endif; ?>
          </ul>
          <?php else : ?>
            <?php header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php'); ?>
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
            
            <input type="submit" name="auswahl" value="Speichern!" />
          </p>
        </form>
    </body>
</html>