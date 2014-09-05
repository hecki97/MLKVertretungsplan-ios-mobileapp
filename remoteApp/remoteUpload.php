<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php $host = $_SERVER['SERVER_NAME']; ?>
<?php include("$root/mlkvplan/remoteApp/res/html/htmlHead.html"); ?>
<?php include("$root/mlkvplan/remoteApp/res/php/_remoteUpload.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>MLK-Vertretungsplan RemoteApp</title>
		<link type="text/css" href="http://<?php echo $host; ?>/mlkvplan/res/css/stylesheet.css" rel="stylesheet" />
		<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
		<style type="text/css">
			#content {
				position: absolute;
			    left: 0;
				margin: 0;
			    width: 100%;
			    display: table;
				text-align: center;
			}
		</style>

		<script type="text/javascript">
			$(document).ready(function(){
				var clickedClass = "selected";
				var buttons = "#upload_files button";
				var inputs = "input";
				$(buttons).click(function() {
					$(this).addClass(clickedClass).siblings().removeClass(clickedClass);
			     });
			});
		</script>
		<script type="text/javascript">
			function hideElement(id){
				var element = document.getElementById(id);
				element.style.display = "none";
			}
			function showElement(id){
				var element = document.getElementById(id);
				element.style.display = "block";
			}
		</script>
		<script type="text/javascript">
			function showUploadDiv(){
				var uploadDiv = document.getElementById('uploading');
				if(uploadDiv.style.display == 'none'){
					// the div isnt being displayed yet, so lets change the display then write the content
					uploadDiv.style.display = 'block';
					uploadDiv.innerHTML = 'Please wait while your files are being uploaded...<br/><div id="loading_image"></div>';
				}
			}
		</script>
	</head>
	<body class="metro">
	<header>
    	<nav class="navigation-bar dark fixed-top">
      		<nav class="navigation-bar-content">
	          	<a href="http://<?php echo $host; ?>/mlkvplan/remoteApp/res/php/_remoteLogout.php" class="element"><span class="icon-switch"></span> Logout</a>
	   
		        <span class="element-divider"></span>
		        <button class="element brand" onclick="window.location.reload();"><span class="icon-spin"></span></button>
		        <span class="element-divider"></span>

		        <a href="./remoteInfo.php" class="element brand place-right"><span class="icon-cog"></span></a>
		        <span class="element-divider place-right"></span>
		        <a class="element place-right">
		            <?php echo $version; ?>
		        </a>
		        <span class="element-divider place-right"></span>
      		</nav>
   		</nav>
	</header>
	<div class="head">
		<form action="./remoteUpload.php" method="post" enctype="multipart/form-data" name="upload_files_form">
			<h1>MLKVPlan-html-Uploader:</h1>
			<table cellpadding="25" align="center">
				<tr>
					<td>
						<h1>Modul1:</h1>
						<h3>Hier 'modul1.html' hochladen!</h3>
                  		<p>Max. Dateigröße 250KB!</p>
						<div id="upload_files">
							<div class="upload_file" id="upload_file_1">
					    		<div class="select_upload_type">
					        		<button id="1_computer_button" name="upload_type_computer" type="button" onclick="hideElement('1_upload_url'); showElement('1_upload_computer')">Upload From Computer</button>
					            	<button id="1_url_button" name="upload_type_url" type="button" onclick="hideElement('1_upload_computer'); showElement('1_upload_url')">Upload From URL</button>
					        	</div>
					        <div class="upload">
					        	<div id="1_upload_computer">
					            	<input type="file" name="files_hdd[]" size="30" class="upload_input" />
					            </div>
					            <div id="1_upload_url" style="display:none">
					            	<input type="text" name="files_url[]" size="30" class="upload_input" maxlength="100" value="http://" onfocus="if(this.value == 'http://') this.value = '';" id="1_input_url" />
					            </div>
					        </div>
					    </div>
					</td>
					<td>
						<h1>Modul2:</h1>
						<h3>Hier 'modul2.html' hochladen!</h3>
                  		<p>Max. Dateigröße 250KB!</p>
						<div class="upload_file" id="upload_file_2">
					    	<div class="select_upload_type">
					        	<button id="2_computer_button" name="upload_type_computer" type="button" onclick="hideElement('2_upload_url'); showElement('2_upload_computer')">Upload From Computer</button>
					            <button id="2_url_button" name="upload_type_url" type="button" onclick="hideElement('2_upload_computer'); showElement('2_upload_url')">Upload From URL</button>
					        </div>
					        <div class="upload">
					        	<div id="2_upload_computer">
					            	<input type="file" name="files_hdd[]" size="30" class="upload_input" />
					            </div>
					            <div id="2_upload_url" style="display:none">
					            	<input type="text" name="files_url[]" size="30" class="upload_input" maxlength="100" value="http://" onfocus="if(this.value == 'http://') this.value = '';" id="2_input_url" />
					            </div>
					        </div>
					    </div>
					</td>
				</tr>
				</table>
				<p style="font-size:11px"><strong>Only 2 files are uploaded at a time.</strong><br/>
				    Files from your computer have precedence over URL files.</p>
				<table align="center">
				<tr>
					<td>
						<input type="submit" name="submit" value="Upload Files Now" class="upload_submit" onclick="showUploadDiv()" />					</td>
					<td>
						<input type="reset" name="reset" value="Reset Fields" class="upload_reset" />
					</td>
				</tr>
				</table>

				<div id="uploading" style="display:none">
				</div>
			</form>
			</p>
				<?=$upload_result;?>
			</div>
		</div>
	</body>
</html>