<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include(dirname(__FILE__)."/res/html/htmlHead.html"); ?>
<?php include(dirname(__FILE__)."/res/php/_onlineEditor.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		<title>Online-Editor</title>
		<script type="text/javascript">
			function UR_Start() 
			{
				UR_Nu = new Date;
				UR_Indhold = showFilled(UR_Nu.getHours()) + ":" + showFilled(UR_Nu.getMinutes()) + ":" + showFilled(UR_Nu.getSeconds());
				document.getElementById("ur").innerHTML = UR_Indhold;
				setTimeout("UR_Start()",1000);
			}
			
			function showFilled(Value) 
			{
				return (Value > 9) ? "" + Value : "0" + Value;
			}
		</script>
	</head>

	<body class="metro" onload="UR_Start()">
		<header>
		    <nav class="navigation-bar dark fixed-top">
		      <nav class="navigation-bar-content">
		          <button class="element"><span class="icon-home"></span> Online-Editor<sup><?=$lang; ?></sup></button>
		   
		          <span class="element-divider"></span>
		          <button class="element brand no-phone no-tablet" onclick="window.location.reload();"><span class="icon-spin"></span></button>
		          <span class="element-divider"></span>

		          <a href="./info.php" class="element brand place-right no-phone no-tablet"><span class="icon-cog"></span></a>
		          <span class="element-divider place-right"></span>
		          <a class="element place-right no-phone no-tablet">
		            <?=$version; ?>
		          </a>
		          <span class="element-divider place-right"></span>
		          <a class="element place-right no-phone no-tablet">
		            <span class="icon-unlocked"></span> <?=$_SESSION["username"]; ?>
		          </a>
		          <span class="element-divider place-right"></span>
		      </nav>
		    </nav>
		 </header>

		<div class="container" style="text-align: center;">
			<h1>MLK Vertretungsplan Online-Editor</h1>
					
				<form action='onlineEditor.php'>
					<h2>
						<?=$string['online.editor']['willkommen'].$_SESSION["username"]; ?>

						<?php if($row->md5 == md5('000')) : ?>
							<br><span style = 'color:#FFBF00'><?=$string['online.editor']['alert.key']; ?></span>
						<?php endif; ?>
					</h2>
				</form>

				<?=$string['online.editor']['upload']; ?>
					<form action='onlineEditor.php'>
				    	<input type="submit" name="fupload" value="<?=$string['online.editor']['button.submit.click']; ?>">
				    </form><br>
				<?=$string['online.editor']['einstellungen']; ?>
					<form>
				    	<input type="submit" name="fsettings" value="<?=$string['online.editor']['button.submit.click']; ?>">
				    </form><br>

				<form action=<?="http://$host/mlkvplan/res/php/_logout.php"; ?> method="post">
					<script>
						function show_confirm_logout()
						{
						    return confirm("<?=$string['online.editor']['javascript.confirm.logout']; ?>");
						}
					</script>
					<input type="submit" onclick="return show_confirm_logout();" value="<?=$string['online.editor']['button.submit.logout']; ?>">
				</form>

			<!-- Datum + Uhrzeit -->
				<p>
					<br/><h2><font id="ur" size="30"></font></h2>
					<h2><?=date('d F Y'); ?></h2>
				</p>

		</div>
	</body>
</html>