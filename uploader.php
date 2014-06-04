<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include('./htmlHead.html'); ?>
<?php include('./_uploader.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		<title> MLK-Vertretungsplan HTML Upload </title>
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
	        <a class="element place-right">
	        <span class="icon-unlocked"></span> <?php echo $_SESSION["username"]; ?>
	        </a>
	        <span class="element-divider place-right"></span>
	      </nav>
	    </nav>
	  </header>

	<div class="container" style="text-align: center;">
		<h1>'.html' Dateien hochladen</h1>
		<form action="uploader.php" method="post" enctype="multipart/form-data"> 
			<h3>Hier 'modul1.html' hochladen!</h3>
			<input type="file" name="modul1">
			<br>
			<?php if(!empty($mlkvplan_array_modul1->Datum_Modul1)) : ?>
				Letztes Update: <?php echo $mlkvplan_array_modul1->Datum_Modul1; ?>
			<?php else : ?>
				???
			<?php endif; ?>
				
			<br><br><h3>Hier 'modul2.html' hochladen!</h3>
			<input type="file" name="modul2">
			<br>
			<?php if(!empty($mlkvplan_array_modul2->Datum_Modul2)) : ?>
				Letztes Update: <?php echo $mlkvplan_array_modul2->Datum_Modul2; ?>
			<?php else : ?>
				???
			<?php endif; ?>
			<br><br><input type="submit" value="Hochladen">			

			<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
			<ul>
				<?php if (!empty($_FILES['modul1']['name'])) : ?>
				<ul>
					<?php if ($_FILES['modul1'] ['type'] == "text/html") : ?>
					<ul>
						<?php if ($_FILES['modul1'] ['size'] < 256000) : ?>
						<ul>
							<?php if ($_FILES['modul1'] ['name'] == 'modul1'.".html") : ?>
							<ul>
								<?php if (is_file($_FILES['modul1']['name'])) : unlink($_FILES['modul1']['name']); ?>
								<?php endif; ?>
								<?php move_uploaded_file($_FILES['modul1']['tmp_name'], "html/".$_FILES['modul1']['name']); ?>
								<?php $array['Datum_Modul1'] = date("d/m/y"); ?>
				      			<span style ='color:#04B404'>Die Datei <?php echo $_FILES['modul1'] ['name']; ?> wurde Erfolgreich nach html/<?php echo $_FILES['modul1']['name']; ?> hochgeladen</span><br/>
							</ul>
							<?php else : ?>
								<span style ='color:#ff0000'>Bitte <?php echo $_FILES['modul1']['name']; ?>  'modul1.html' nennen!</span><br/>
							<?php endif; ?>
						</ul>
						<?php else : ?>
							<span style ='color:#ff0000'>Die Datei '<?php echo $_FILES['modul1']['name']; ?>' darf maximal 250Kb groß sein!</span><br/>
						<?php endif; ?>
						</ul>
					<?php else : ?>
						<span style ='color:#ff0000'><?php echo $_FILES['modul1']['name']; ?> ist keine '.html' Datei!</span><br/>
					<?php endif; ?>
				</ul>
				<?php else : ?>
					<span style ='color:#ff0000'>Fehler beim Hochladen von modul1.html'</span><br/>
				<?php endif; ?>
			
			<?php if (!empty($_FILES['modul2']['name'])) : ?>
			<ul>
				<?php if ($_FILES['modul2'] ['type'] == "text/html") : ?>
				<ul>
					<?php if ($_FILES['modul2'] ['size'] < 256000) : ?>
					<ul>
						<?php if ($_FILES['modul2'] ['name'] == 'modul2'.".html") : ?>
						<ul>
							<?php if (is_file($_FILES['modul2']['name'])) : unlink($_FILES['modul2']['name']); ?>
							<?php endif; ?>
							<?php move_uploaded_file($_FILES['modul2']['tmp_name'], "html/".$_FILES['modul2']['name']); ?>
							<?php $array['Datum_Modul2'] = date("d/m/y"); ?>
			      			<span style ='color:#04B404'>Die Datei <?php echo $_FILES['modul2'] ['name']; ?> wurde Erfolgreich nach html/<?php echo $_FILES['modul2']['name']; ?> hochgeladen</span>
						</ul>
						<?php else : ?>
							<span style ='color:#ff0000'>Bitte <?php echo $_FILES['modul2']['name']; ?>  'modul1.html' nennen!</span>
						<?php endif; ?>
					</ul>
					<?php else : ?>
						<span style ='color:#ff0000'>Die Datei '<?php echo $_FILES['modul2']['name']; ?>' darf maximal 250Kb groß sein!</span>
					<?php endif; ?>
				</ul>
				<?php else : ?>
					<span style ='color:#ff0000'><?php echo $_FILES['modul2']['name']; ?> ist keine '.html' Datei!</span>
				<?php endif; ?>
			</ul>
			<?php else : ?>
				<span style ='color:#ff0000'>Fehler beim Hochladen von modul2.html'</span>
			<?php endif; ?>
		</ul>
		<?php endif; ?>

	<!-- Beste Lösung ever! :D -->
		<?php if (!empty($_FILES['modul1']['name']) && ($_FILES['modul1'] ['type'] == "text/html") && ($_FILES['modul1'] ['size'] < 256000) && ($_FILES['modul1'] ['name'] == 'modul1'.".html") || (!empty($_FILES['modul2']['name'])) && ($_FILES['modul2'] ['type']) == "text/html" && ($_FILES['modul2'] ['size'] < 256000) && ($_FILES['modul2'] ['name'] == 'modul2'.".html")) : ?>
			<?php EncodeArrayToJSON($date_config, $array); ?>
		<?php endif; ?>
		</form>
		<form>
		    <input type="submit" name="fback" value="Zur Auswahl">
		</form>
	</div>
</body>
</html>