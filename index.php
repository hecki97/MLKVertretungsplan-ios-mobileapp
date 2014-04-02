<html>
<head>
    <title>MLK-Vertretungsplan</title>
    <!--<meta http-equiv="refresh" content="310; URL=Blank.aspx" content=”width=570; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;”/>
    <meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1, user-scalable=yes" /> -->
    <link href="apple-touch-icon@60x60.png" rel="apple-touch-icon" />
    <link href="apple-touch-icon@76x76.png" rel="apple-touch-icon" sizes="76x76" />
    <link href="apple-touch-icon@120x120.png" rel="apple-touch-icon" sizes="120x120" />
    <link href="apple-touch-icon@152x152.png" rel="apple-touch-icon" sizes="152x152" />
    <meta name="viewport" content="height=device-height, initial-scale=0.75, maximum-scale=0.75, user-scalable=yes" />
</head>

<style>
  @font-face {
      font-family: 'fonts';
      src: url('Walkway Bold.ttf');
      font-style: normal;
  }

  .text { 
    position: absolute;
    text-align: center; 
    font-size: 35;
    font-family: fonts;
    text-shadow: 1px 1px 1px #555;
    top: 25px;
    width: 100%; 
  }
</style>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
  
<?php
  $datei = "datum.dat";
  $fp = fopen($datei, "r");
?>

  <table border=0 bordercolor="#000000" cellpadding=0 cellspacing=0 width="1163" height="658">
		<tr>
			<td colspan="1" rowspan="1" width="581" height="657" style="border-right:1px solid black;">
               <iframe src="html/modul1.html" name="Vertretungsplan-Modul" scrolling="no" noresize frameborder=0  width="581" height="657" style="overflow: hidden;">
                </iframe>
                  <div class="text">
                    <!--<h3><p id="Daten">Stand: </p></h3>-->
                    <h3> Stand: <?php echo fgets($fp); ?></h3>
                </div>
			</td>
			<td colspan="1" rowspan="1" width="581" height="657" style="">
    			<iframe src="html/modul2.html" name="Vertretungsplan-Modul 2" scrolling="no" noresize frameborder=0  width="581" height="657" style="overflow: hidden;">
                </iframe>
			</td>
		</tr>
	</table>
</body>
</html>
