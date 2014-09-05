<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php include("$root/mlkvplan/res/html/htmlHead.html"); ?>
<?php include("$root/mlkvplan/res/php/_onlineEditor.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		<title>Online-Editor</title>
	</head>

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

	<body class="metro" onload="UR_Start()">
		<header>
		    <nav class="navigation-bar dark fixed-top">
		      <nav class="navigation-bar-content">
		          <button class="element"><span class="icon-home"></span> Online-Editor<sup><?php echo $lang; ?></sup></button>
		   
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
			<h1>MLK Vertretungsplan Online-Editor</h1>
					
				<form action='onlineEditor.php'>
					<h2>
						<?php echo $string['onlineeditor']['welcome'].$_SESSION["username"]; ?>

						<?php if($row->md5 == md5('000')) : ?>
							<br><span style = 'color:#FFBF00'><?php echo $string['onlineeditor']['alert.key']; ?></span>
						<?php endif; ?>
					</h2>
				</form>

				<?php echo $string['onlineeditor']['upload']; ?>
					<form action='onlineEditor.php'>
				    	<input type="submit" name="fupload" value="<?php echo $string['onlineeditor']['button.submit.click']; ?>">
				    </form><br>
				<?php echo $string['onlineeditor']['settings']; ?>
					<form>
				    	<input type="submit" name="fsettings" value="<?php echo $string['onlineeditor']['button.submit.click']; ?>">
				    </form><br>

				<form action=<?php echo "http://$host/mlkvplan/res/php/_logout.php"; ?> method="post">
					<script>
						function show_confirm_logout()
						{
						    return confirm("<?php echo $string['onlineeditor']['javascript.confirm.logout']; ?>");
						}
					</script>
					<input type="submit" onclick="return show_confirm_logout();" value="<?php echo $string['onlineeditor']['button.submit.logout']; ?>">
				</form>

			<!-- Datum + Uhrzeit -->
				<p>
					<br/><h2><font id="ur" size="30"></font></h2>
					<h2><?php echo date('d F Y'); ?></h2>
				</p>

		</div>
	</body>
</html>