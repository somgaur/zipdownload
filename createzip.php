<?php
if(isset($_REQUEST['createzip']) and $_REQUEST['createzip']!=""){
	extract($_REQUEST);
	
	$filename	=	'your-zip-file-name.zip';
	
	$db   		=   new mysqli('localhost','root','','zipdownload');
	$fileQry	=	$db->query('SELECT * FROM files WHERE id IN ('.implode(",",$fileId).')');
	
	$zip = new ZipArchive;
	if ($zip->open($filename,  ZipArchive::CREATE)){
		while($row	=	$fileQry->fetch_assoc()){
			$zip->addFile(getcwd().'/'.'uploads/'.$row['filename'], $row['filename']);
		}
		
		
		$zip->close();
		ob_end_clean();
		header("Content-type: application/zip"); 
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-length: " . filesize($filename));
		header("Pragma: no-cache"); 
		header("Expires: 0"); 
		readfile("$filename");
		unlink($filename);
	}else{
	   echo 'Failed!';
	}
}
?>