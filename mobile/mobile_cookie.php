<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php include("$root/mlkvplan/mobile/res/html/mobileHtmlHead.html"); ?>
<?php include("$root/mlkvplan/mobile/res/php/_mobile_cookie.php"); ?>
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