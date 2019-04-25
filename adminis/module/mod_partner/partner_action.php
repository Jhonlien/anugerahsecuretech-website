<?php
include '../../../config/conn.php';
$mod=@$_GET['mod'];
$act=@$_GET['act'];
if($mod == 'partner' && $act == 'add'){
		$logo 	= count($_FILES['logo']['name']);
		if($logo>0){
			for ($i=0; $i < $logo; $i++) {
				$logo_name = $_FILES['logo']['name'][$i];
				$location = $_FILES['logo']['tmp_name'][$i];
				$folder = "../../../img/partner/$logo_name";
				move_uploaded_file($location, $folder);
				$query =  "INSERT INTO `tb_partner` (`logo`) 
						   VALUES ('$logo_name')";
				mysqli_query($conn, $query);
			}
			header('location:../../media.php?mod='.$mod.'&suc=1');		
		}		
}
else if($mod == 'partner' && $act == 'delete'){
	$id = $_GET['id'];
	mysqli_query($conn, "DELETE FROM `tb_partner` WHERE id = '$_GET[id]'");
	header('location:../../media.php?mod='.$mod.'&suc=4');	
	}

?>