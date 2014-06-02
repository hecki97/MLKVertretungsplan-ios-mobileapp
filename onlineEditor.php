<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include('./htmlHead.html'); ?>
<?php include('./_onlineEditor.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		<title>MLK Vertretungsplan Online Editor</title>
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
			<h1>MLK VK Vertretungsplan Online Editor</h1>
					
					<form action='onlineEditor.php'>
						<h2>
							<?php echo "Willkommen, ".$_SESSION["username"]; ?>

							<?php if($mlkvplan_array_key->Key == md5('000')) : ?>
								<br><span style = 'color:#FFBF00'>Bitte sofort den Standard-Einladungscode updaten!</span>
							<?php endif; ?>
						</h2>
					</form>

					Vertretungsplan aktualisieren:
						<form action='onlineEditor.php'>
				    		<input type="submit" name="fupload" value="Klick hier!">
				    	</form><br>
				    Einstellungen:
						<form>
				    		<input type="submit" name="fsettings" value="Klick hier!">
				    	</form><br>

					<form action="./_logout.php" method="post">
						<script>
						    function show_confirm_logout()
						    {
						        return confirm("Wollen Sie sich wirklich ausloggen?");
						    }
						</script>
						<input type="submit" onclick="return show_confirm_logout();" value="Ausloggen!">
					</form>

				<!-- Datum + Uhrzeit -->
					<p>
						<br/><h2><font id="ur" size="30"></font></h2>
						<h2><?php echo date('d F Y'); ?></h2>
					</p>

		</div>
	</body>
</html>