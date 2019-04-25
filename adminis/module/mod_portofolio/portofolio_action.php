<?php
include '../../../config/conn.php';
$mod=@$_GET['mod'];
$act=@$_GET['act'];
if($mod == 'portofolio' && $act == 'add'){
		$title 	= $_POST['title'];
		$place	= $_POST['place'];
		$cover 	= $_FILES['cover']['name'];
		$image1 = $_FILES['image1']['name'];
		$image2 = $_FILES['image2']['name'];
		$image3 = $_FILES['image3']['name'];

		$lokasi_file_cover 	= $_FILES['cover']['tmp_name'];
		$lokasi_file_image1 = $_FILES['image1']['tmp_name'];
		$lokasi_file_image2 = $_FILES['image2']['tmp_name'];
		$lokasi_file_image3 = $_FILES['image3']['tmp_name'];

		$folder_cover 	= "../../../img/portofolio/$cover";
		$folder_image1 	= "../../../img/portofolio/$image1";
		$folder_image2 	= "../../../img/portofolio/$image2";
		$folder_image3 	= "../../../img/portofolio/$image3";

		move_uploaded_file($lokasi_file_cover,  $folder_cover);
		move_uploaded_file($lokasi_file_image1, $folder_image1);
		move_uploaded_file($lokasi_file_image2, $folder_image2);
		move_uploaded_file($lokasi_file_image3, $folder_image3);

		$query =  "INSERT INTO `tb_portofolio` (`title`,`place`,`cover`,`image1`,`image2`,`image3`) 
										VALUES ('$title','$place','$cover','$image1','$image2','$image3')";
		mysqli_query($conn, $query);
		header('location:../../media.php?mod='.$mod.'&suc=1');
}
else if($mod == 'profolio' && $act == 'delete'){
	$id = $_GET['id'];
	mysqli_query($conn, "DELETE FROM `tb_portofolio` WHERE id = '$_GET[id]'");
		header('location:../../media.php?mod='.$mod.'&suc=4');	
	}

//else if($mod == 'files' && $act == 'update'){
// 		$title = $_POST['title'];
// 		$files = $_FILES['files']['name'];
// 		$files2 = $_POST['files2'];
// 		$lokasi_file = $_FILES['files']['tmp_name'];
// 		$type = $_FILES['files']['type'];
// 		$folder = "../../../files/$files";
// 		$category = $_POST['category'];
// 		if(empty($files)){
// 			$query = "UPDATE `tb_files` SET 
// 							`title` 		= '$title',
// 							`files` 		= '$files2',
// 							`category`		= '$category'
// 					  WHERE id=$_GET[id]";
// 			mysqli_query($conn, $query);
// 			header('location:../../media.php?mod='.$mod.'&suc=2');
// 		}
// 		else{
// 			move_uploaded_file($lokasi_file, $folder);
// 			$query = "UPDATE `tb_files` SET 
// 							`title` 		= '$title',
// 							`files` 		= '$files',
// 							`category`		= '$category'
// 					  WHERE id=$_GET[id]";
// 			mysqli_query($conn, $query);
// 			header('location:../../media.php?mod='.$mod.'&suc=2');
// 			}
// }
?>


