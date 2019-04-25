<?php
include '../../../config/conn.php';
$mod=@$_GET['mod'];
$act=@$_GET['act'];
if($mod == 'service' && $act == 'add'){
		$icon = $_FILES['icon']['name'];
		$title = $_POST['title'];
		$lokasi_file = $_FILES['icon']['tmp_name'];
		$type = $_FILES['icon']['type'];
		$folder = "../../../img/icon/$icon";
		if($type != "image/jpeg" AND $type != "image/pjpeg" AND $type != "image/png"){
			echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG, *.PNG');
        				window.location=('../../media.php?mod=service')</script>";
        }
		else{
			move_uploaded_file($lokasi_file, $folder);
			$query =  "INSERT INTO `tb_services` (`icon`, `title`) 
						VALUES ('$icon','$title')";
			mysqli_query($conn, $query);
			header('location:../../media.php?mod='.$mod.'&suc=1');
			}
}
else if($mod == 'service' && $act == 'update'){
		$title = $_POST['title'];
		$icon = $_FILES['icon']['name'];
		$icon2 = $_POST['icon2'];
		$lokasi_file = $_FILES['icon']['tmp_name'];
		$type = $_FILES['icon']['type'];
		$folder = "../../../img/icon/$icon";
		if(empty($icon)){
			$query = "UPDATE `tb_services` SET 
							`icon` 			= '$icon2', 
							`title` 		= '$title'
					  WHERE id=$_GET[id]";
			mysqli_query($conn, $query);
			header('location:../../media.php?mod='.$mod.'&suc=2');
		}
		else{
			move_uploaded_file($lokasi_file, $folder);
			$query = "UPDATE `tb_services` SET 
							`icon` 			= '$icon', 
							`title` 		= '$title'
					  WHERE id=$_GET[id]";
			mysqli_query($conn, $query);
			header('location:../../media.php?mod='.$mod.'&suc=2');
			}
}

else if($mod == 'service' && $act == 'delete'){
	$id = $_GET['id'];
	$q = mysqli_query($conn, "SELECT * FROM tb_services WHERE id = $id");
	$query = mysqli_query($conn, "DELETE FROM tb_services WHERE id = '$_GET[id]'");
	if($query == true){
		$fetch = mysqli_fetch_array($q);
		header('location:../../media.php?mod='.$mod.'&suc=4');	
	}
}
?>