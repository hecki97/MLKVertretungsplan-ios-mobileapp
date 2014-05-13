<?php
  include('footerVersionHandler.php');
  include('buttonScript.php');
  
  $hostname = $_SERVER['HTTP_HOST'];
  $path = dirname($_SERVER['PHP_SELF']);

  //Zum HTML Plan
  forwardButton($hostname, $path, "fhtml", "index.php");
  //Zum Login
  forwardButton($hostname, $path, "flogin", "login.php");
?>

<html>
<head>
    <title>MLK-Vertretungsplan</title>
    <link href="icons/apple-touch-icon@60x60.png" rel="apple-touch-icon" />
    <link href="icons/apple-touch-icon@76x76.png" rel="apple-touch-icon" sizes="76x76" />
    <link href="icons/apple-touch-icon@120x120.png" rel="apple-touch-icon" sizes="120x120" />
    <link href="icons/apple-touch-icon@152x152.png" rel="apple-touch-icon" sizes="152x152" />
    <meta name="viewport" content="height=device-height, initial-scale=0.75, maximum-scale=0.75, user-scalable=yes" />
    <link rel="stylesheet" type="text/css" href="css/index_stylesheet.css">
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<div class="header_container">
    <form action='index_flash.php'>
      <span style="font-family:fonts;text-align:center; margin-right:100px; vertical-align:middle;"><h2 class="header">MLK-Vertretungsplan Online<sup>flash</sup></span>
      <div class="login"><input type="submit" name="flogin" value="Zum Login!"></h2></div></span>
    </form>
  </div>

  <div class="content">
      <table style="text-align: left; width:1200; height:800; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: 50;" border="0" cellpadding="0" cellspacing="0">
        <tr>
    			<td colspan="1" rowspan="1" width="585" height="800" style="border-color:#000000;border-width:2px;border-style:solid;">
            <iframe src="https://light.dsbcontrol.de/DSBlightWebsite/(S(wns2f3dhy5w21zzxuzomq1ph))/Homepage/PreProgram.aspx?ID=a290d4b8-79f8-4afe-a676-d15b75233151&ID2=d24a5dd7-48c6-4b27-8f79-464a62af12bf" name="Vertretungsplan-Modul" scrolling="no" noresize frameborder=0  width="100%" height="100%" style="overflow: hidden;"></iframe> 
    			</td>
    			<td colspan="1" rowspan="1" width="585" height="800" style="border-color:#000000;border-width:2px;border-style:solid;border-left-style:none;">
        		<iframe src="https://light.dsbcontrol.de/DSBlightWebsite/(S(wns2f3dhy5w21zzxuzomq1ph))/Homepage/PreProgram.aspx?ID=9de26a53-1a27-40ed-9ee1-82b65a6bcb38&ID2=d24a5dd7-48c6-4b27-8f79-464a62af12bf" name="Vertretungsplan-Modul 2" scrolling="no" noresize frameborder=0  width="100%" height="100%" style="overflow: hidden;"></iframe>
    			</td>
           
    		</tr>
         <caption align="bottom">
            <p>  
              <h3>
                <span style="text-align:center;">Diese Version ist immer aktuell</span>
              </h3>
            </p>
              <form style"text-align:center">
                <input type="submit" name="fhtml" value="HTML Version"><br>
              </form><br>
          </caption>
    	</table>
  </div>

<div class="footer_container">
  <div class="footer">
    <span style = "font-family:fonts;text-align:center;">
      <b><? echo $version; ?></b>
    </span>
  </div>
</div>

</body>
</html>
