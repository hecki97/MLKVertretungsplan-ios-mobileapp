<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php $host = $_SERVER['SERVER_NAME']; ?>
<?php include(dirname(__FILE__)."/res/html/htmlHead.html"); ?>
<?php include(dirname(__FILE__)."/res/php/_upload.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Upload</title>
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
					uploadDiv.innerHTML = '<?=$string["labels"]["l.uploading"]; ?>';
				}
			}
		</script>
	</head>

	<body class="metro">
		<header>
	    <nav class="navigation-bar dark fixed-top">
	      <nav class="navigation-bar-content">
	        <a href="./onlineEditor.php" class="element"><span class="icon-arrow-left-5"></span> <?=$string['links']['a.online.editor']; ?><sup><?=$lang; ?></sup></a>
	       
	        <span class="element-divider"></span>
	        <button class="element brand no-phone no-tablet" onclick="window.location.reload();"><span class="icon-spin"></span></button>
	        <span class="element-divider"></span>

	        <a href="./info.php" class="element brand place-right no-phone no-tablet"><span class="icon-cog"></span></a>
	        <span class="element-divider place-right"></span>
	        <a class="element place-right no-phone no-tablet"><?=$version; ?></a>
	        <span class="element-divider place-right"></span>
	        <a class="element place-right no-phone no-tablet"><span class="icon-unlocked"></span> <?=$_SESSION["username"]; ?></a>
	        <span class="element-divider place-right"></span>
	      </nav>
	    </nav>
	  </header>
		<div class="head">
		<form action="./upload.php" method="post" enctype="multipart/form-data" name="upload_files_form">
			<h1><?=$string['labels']['l.upload']; ?></h1>
			<table cellpadding="25" align="center">
				<tr>
					<td>
						<h1><?=$string['labels']['l.modul1']; ?>:</h1>
						<h3><?=$string['labels']['l.modul1.upload']; ?></h3>
                  		<p><?=$string['labels']['l.max.filesize']; ?></p>
						<div id="upload_files">
							<div class="upload_file" id="upload_file_1">
					    		<div class="select_upload_type">
					        		<button id="1_computer_button" name="upload_type_computer" type="button" onclick="hideElement('1_upload_url'); showElement('1_upload_computer')"><?=$string['buttons']['b.upload.computer']; ?></button>
					            	<button id="1_url_button" name="upload_type_url" type="button" onclick="hideElement('1_upload_computer'); showElement('1_upload_url')"><?=$string['buttons']['b.upload.url']; ?></button>
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
						<h1><?=$string['labels']['l.modul2']; ?>:</h1>
						<h3><?=$string['labels']['l.modul2.upload']; ?></h3>
                  		<p><?=$string['labels']['l.max.filesize']; ?></p>
						<div class="upload_file" id="upload_file_2">
					    	<div class="select_upload_type">
					        	<button id="2_computer_button" name="upload_type_computer" type="button" onclick="hideElement('2_upload_url'); showElement('2_upload_computer')"><?=$string['buttons']['b.upload.computer']; ?></button>
					            <button id="2_url_button" name="upload_type_url" type="button" onclick="hideElement('2_upload_computer'); showElement('2_upload_url')"><?=$string['buttons']['b.upload.url']; ?></button>
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
				<p style="font-size:11px"><strong><?=$string['labels']['l.warning1']; ?></strong><br/>
				    <?=$string['labels']['l.warning2']; ?></p>
				<table align="center">
				<tr>
					<td><input type="submit" name="submit" value="<?=$string['buttons']['b.upload']; ?>" class="upload_submit" onclick="showUploadDiv()" /></td>
					<td><input type="reset" name="reset" value="<?=$string['buttons']['b.reset']; ?>" class="upload_reset" /></td>
				</tr>
				</table>
				<div id="uploading" style="display:none"></div>
				<?=$upload_result;?>
			</form>
			</p>
			</div>
		</div>
	</body>
</html>