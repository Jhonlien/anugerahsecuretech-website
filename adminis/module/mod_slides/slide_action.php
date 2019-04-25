<?php
include '../../../config/conn.php';
$mod=@$_GET['mod'];
$act=@$_GET['act'];
if($mod == 'slides' && $act == 'add'){
		$active = $_POST['active'];
		$image = $_FILES['image']['name'];
		$lokasi_file = $_FILES['image']['tmp_name'];
		$type = $_FILES['image']['type'];
		$folder = "../../../img/slide/$image";
		if($type != "image/jpeg" AND $type != "image/pjpeg" AND $type != "image/png"){
			echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        				window.location=('../../media.php?mod=slides')</script>";}
		else{
			move_uploaded_file($lokasi_file, $folder);
			$query =  "INSERT INTO `tb_slides`(`image`, `active`) VALUES ('$image','$active')";
			mysqli_query($conn, $query);
			header('location:../../media.php?mod='.$mod.'&suc=1');
			}
	}
else if($mod == 'slides' && $act == 'update'){
		$active = $_POST['active'];
		$image = $_FILES['image']['name'];
		$image2 = $_POST['image2'];
		$lokasi_file = $_FILES['image']['tmp_name'];
		$type = $_FILES['image']['type'];
		$folder = "../../../img/slide/$image";
		if(empty($image)){
			$query = "UPDATE `tb_slides` SET 
							`image` 		= '$image2', 
							`active`		= '$active' 
					  WHERE id=$_GET[id]";
			mysqli_query($conn, $query);
			header('location:../../media.php?mod='.$mod.'&suc=2');
		}
		else if($type != "image/jpeg" AND $type != "image/pjpeg" AND $type != "image/png"){
				echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        				window.location=('../../media.php?mod=slides')</script>";
			}
		else{
			move_uploaded_file($lokasi_file, $folder);
			$query = "UPDATE `tb_slides` SET 
							`image` 		= '$image', 
							`active`		= '$active' 
					  WHERE id=$_GET[id]";
			mysqli_query($conn, $query);
			header('location:../../media.php?mod='.$mod.'&suc=2');
			}
}

else if($mod == 'slides' && $act == 'delete'){
	$id = $_GET['id'];
	$q = mysqli_query($conn, "SELECT * FROM tb_slides WHERE id = $id");
	$query = mysqli_query($conn, "DELETE FROM tb_slides WHERE id = '$_GET[id]'");
	if($query == true){
		$fetch = mysqli_fetch_array($q);
		unlink('localhost/anugerahtech/img/slide/$fetch[image]');
		header('location:../../media.php?mod='.$mod.'&suc=4');	
	}
}
?>