<?php
include '../../../config/conn.php';
$mod=@$_GET['mod'];
$act=@$_GET['act'];
if($mod == 'client' && $act == 'add'){
    $name   = $_POST['name'];
    $position = $_POST['position'];
    $comment = $_POST['comment'];

    mysqli_query($conn, "INSERT INTO `tb_client`(`client_name`, `client_position`, `comment`) VALUES ('$name','$position','$comment')");
    header('location:../../media.php?mod='.$mod.'&suc=1');    
}
else if($mod == 'client' && $act == 'delete'){
  $id = $_GET['id'];
  mysqli_query($conn, "DELETE FROM `tb_client` WHERE id = '$_GET[id]'");
    header('location:../../media.php?mod='.$mod.'&suc=4');  
  }

?>