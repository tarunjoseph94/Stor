<!DOCTYPE html>
<html>
<head>
	<?php include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/header.php';
	include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
	?>
</head>
<body>
	<nav class="navbar sticky-top bg-nav">
		<span class="navbar-brand width25" href="#">Stor</span>
		<div class="navbar-right width40">
			<a class="navbar-links" href="student_active_subject.php">Active Subjects</a>
			<a class="navbar-links" href="student_prev_subject.php">Previous Subjects</a>
			<a class="btn btn-color" href="logout.php">Logout</a>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-8">
				<div class="spacer">
				</div>
				<h2>File Upload</h2>
				<div class="file-upload">
					<form enctype="multipart/form-data" class="file-upload-inside-box" id="studentfileupload">
						<div class="drag-drop-box">
							<p class="file-upload-inside-box margintop3">Drop Files here</p>
							<p class="file-upload-inside-box">OR</p>
							<label class="btn btn-color">
								<input type="file" id="files" class=" file-upload-inside-box" name="files[]" multiple="multiple">
								Upload a file
							</label>
						</div>
						<div class="spacer">
						</div>
						<div id="selectedFiles"></div>
						<div class="spacer">
						</div>
						<input type="submit" class="btn btn-color" />
					</form>
					</div>
				</div>

			</div>

		</body>
		<script>
$(document).ready(function(){
		$(".drag-drop-box").on(" drop dragdrop", function(e) {
			//drop dragend dragstart dragenter dragleave drag dragover
				event.preventDefault();
				event.stopPropagation();
				var files = e.originalEvent.dataTransfer.files;
				processFileUpload(files);
				handleFileSelect(e);
				// forward the file object to your ajax upload method
				return false;
		});
		$('.drag-drop-box').on('dragover',function(event){
    event.preventDefault();
})
});
		function processFileUpload(droppedFiles,e) {
			event.preventDefault();
			event.stopPropagation();
	 // add your files to the regular upload form
		var uploadFormData = new FormData($("#studentfileupload")[0]);
		if(droppedFiles.length > 0) { // checks if any files were dropped
				for(var f = 0; f < droppedFiles.length; f++) { // for-loop for each file dropped
						uploadFormData.append("files[]",droppedFiles[f]);  // adding every file to the form so you could upload multiple files

				}
		}


 	 	}
		var selDiv = "";

		document.addEventListener("DOMContentLoaded", init, false);

		function init() {
			document.querySelector('#files').addEventListener('change', handleFileSelect, false);
			selDiv = document.querySelector("#selectedFiles");
		}

		function handleFileSelect(e) {
			//console.log(e)
			if (typeof e.originalEvent == 'undefined') {
  			e.originalEvent=1;
			}
			if((!e.target.files) && (!e.originalEvent))
			{
				alert("2");
				return;
			}
			selDiv.innerHTML = "";
			if(e.originalEvent==1)
			{
				var files = e.target.files;
			}
			else {
				var files=e.originalEvent.dataTransfer.files;
			}
			for(var i=0; i<files.length; i++) {
				var f = files[i];
				selDiv.innerHTML += f.name + "<br/>";
			}

		}
		</script>
		<script src="../js/bootstrap.min.js"></script>

		</html>
