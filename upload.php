<?php
include_once('az.multi.upload.class.php');

$rename	=	rand(1000,5000).time();
$upload	=	new ImageUploadAndResize();
$upload->uploadMultiFiles('files', 'uploads', $rename, 0755);


$db   =   new mysqli('localhost','root','','zipdownload');
 

foreach($upload->prepareNames as $name){
    $sql = "INSERT INTO files (filename) VALUES ('".$name."')";
 	$flag	=	0;
    if ($db->query($sql) === TRUE) {
        $flag	=	1;
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
if($flag	=	1){
	header('location:index.php?msg=ras');
	exit;
}
?>