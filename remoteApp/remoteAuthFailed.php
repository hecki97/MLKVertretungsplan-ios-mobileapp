<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php include(dirname(__FILE__)."/res/html/htmlHead.html"); ?>
<?php include(dirname(__FILE__)."../res/php/_loadLangFiles.php"); ?>
<?php include(dirname(__FILE__)."../res/php/_getVersionScript.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Authentication failed</title>
    </head>
    <body class="metro">
        <header>
          <nav class="navigation-bar dark fixed-top">
            <nav class="navigation-bar-content">
                <a class="element"><span class="icon-home"></span> RemoteApp<sup><?=$lang; ?></sup></a>
         
                <span class="element-divider"></span>
                <button class="element brand no-phone" onclick="window.location.reload();"><span class="icon-spin"></span></button>
                <span class="element-divider"></span>

                <a href="./remoteInfo.php" class="element brand place-right no-phone"><span class="icon-cog"></span></a>
                <span class="element-divider place-right"></span>
                <a class="element place-right no-phone">
                  <?=$version; ?>
                </a>
                <span class="element-divider place-right"></span>
            </nav>
          </nav>
        </header>

        <div class="container" style="text-align: center;">
            <h1><?=$string['remoteApp']['remoteauthfailed']['ueberschrift']; ?></h1>
            <h2><?=$string['remoteApp']['remoteauthfailed']['unterueberschrift']; ?></h2>
            <form action="remoteLogin.php">
                <input type="submit" name="zumLogin" value="<?=$string['global']['menu.login']; ?>"><br />
            </form>
        </div>
    </body>
</html>