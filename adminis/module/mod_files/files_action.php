<?php
include '../../../config/conn.php';
date_default_timezone_set("Asia/Jakarta");
$mod=@$_GET['mod'];
$act=@$_GET['act'];
if($mod == 'files' && $act == 'add'){
		
		$title = $_POST['title'];
		$files = $_FILES['files']['name'];
		$lokasi_file = $_FILES['files']['tmp_name'];
		$type = $_FILES['files']['type'];
		$folder = "../../../files/$files";
		$category = $_POST['category'];
		//$description = $_POST['description'];
		move_uploaded_file($lokasi_file, $folder);
		$query =  "INSERT INTO `tb_files` (`title`, `files`,`category`,`date_publish`) 
					VALUES ('$title', '$files','$category',NOW())";
		mysqli_query($conn, $query);
		header('location:../../media.php?mod='.$mod.'&suc=1');
		}

else if($mod == 'files' && $act == 'update'){
		$title = $_POST['title'];
		$files = $_FILES['files']['name'];
		$files2 = $_POST['files2'];
		$lokasi_file = $_FILES['files']['tmp_name'];
		$type = $_FILES['files']['type'];
		$folder = "../../../files/$files";
		$category = $_POST['category'];
		if(empty($files)){
			$query = "UPDATE `tb_files` SET 
							`title` 		= '$title',
							`files` 		= '$files2',
							`category`		= '$category'
					  WHERE id=$_GET[id]";
			mysqli_query($conn, $query);
			header('location:../../media.php?mod='.$mod.'&suc=2');
		}
		else{
			move_uploaded_file($lokasi_file, $folder);
			$query = "UPDATE `tb_files` SET 
							`title` 		= '$title',
							`files` 		= '$files',
							`category`		= '$category'
					  WHERE id=$_GET[id]";
			mysqli_query($conn, $query);
			header('location:../../media.php?mod='.$mod.'&suc=2');
			}
}

else if($mod == 'files' && $act == 'delete'){
	$id = $_GET['id'];
	//$q = mysqli_query($conn, "SELECT * FROM tb_services WHERE id = $id");
	$query = mysqli_query($conn, "DELETE FROM tb_files WHERE id = '$_GET[id]'");
	if($query == true){
		//$fetch = mysqli_fetch_array($q);
		header('location:../../media.php?mod='.$mod.'&suc=4');	
	}
}
?>