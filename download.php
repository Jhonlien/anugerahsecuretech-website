<?php
//tentukan folder file yang boleh d download

$file = "files/";

//cek

if(!file_exists($file.$_GET['files'])){
    echo "<h1> Access forbiden </h1>";
    exit;
}
else if(file_exists($file.$_GET['files'])){
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"".$_GET['files']."\"");
    $fp = fopen($file.$_GET['files'],"r");
    $data = fread($fp, filesize($file.$_GET['files']));
    fclose($fp);
    print $data;
}
else{
	echo "<h1> Opps Something Wrong";
}

?>