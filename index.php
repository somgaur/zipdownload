<!doctype html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Select & download multi files in ZIP format with PHP</title>
	
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1><a href="">Select & download multi files in ZIP format with PHP</a></h1>
		
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-download"></i> <strong>Download In Zip</strong></div>
			<div class="card-body">
			
				<div class="col-sm-4 ml-auto mr-auto border p-3">
					<form method="post" enctype="multipart/form-data" action="upload.php">
						<div class="form-group">
							<label><strong>Upload Files</strong></label>
							<div class="custom-file">
								<input type="file" name="files[]" multiple class="custom-file-input" id="customFile">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" name="upload" value="upload" id="upload" class="btn btn-block btn-dark"><i class="fa fa-fw fa-upload"></i> Upload</button>
						</div>
					</form>
				</div>
				
				<hr>
				<div class="table table-responsive">
					<form method="post" action="createzip.php">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr class="bg-primary text-white">
									<th width="25">Sr#</th>
									<th>File Name</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$db   		=   new mysqli('localhost','root','','zipdownload');
								$fileQry	=	$db->query('SELECT * FROM files');
								if($fileQry->num_rows>0){
									$s		=	'';
									while($row	=	$fileQry->fetch_assoc()){
										$s++;
								?>
								<tr>
									<td><?php echo $s;?></td>
									<td>
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" name="fileId[]" class="custom-control-input" id="checkbox<?php echo $row['id']?>" value="<?php echo $row['id']?>">
											<label class="custom-control-label" for="checkbox<?php echo $row['id']?>"><?php echo $row['filename'];?></label>
										</div>
									</td>
								</tr>
									<?php 
									}
								} ?>
								<tr>
									<td colspan="2"><button type="submit" name="createzip" id="createzip" value="createzip" class="btn btn-primary"><i class="fa fa-archive"></i> Download All</button></td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>

		</div>
	</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			$('input[type="file"]').on('change', function () {
				let filenames = [];
				let files = document.getElementById('customFile').files;
				if(files.length>1){
					filenames.push('Total Files ('+files.length+')');
				}else{
					for (let i in files) {
						if (files.hasOwnProperty(i)) {
							filenames.push(files[i].name);
						}
					}
				}
				$(this).next('.custom-file-label').html(filenames.join(','));
			});
		});
	</script>
</body>
</html>