<?php
function error($error){
	$error = $_GET['error'];
    if($error == 01){
        echo  "<div class=\"alert alert-danger alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <h4><i class=\"icon fa fa-ban\"></i> Username atau Password salah !</h4>
   			 	</div>";
    }
    else if($error == 02){
    	echo  "<div class=\"alert alert-danger alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <h4><i class=\"icon fa fa-ban\"></i>Akun anda telah diblokir!</h4>
   			 	</div>";
    }
}

function success($success){
    $success = $_GET['suc'];
    if($success == 1){
        echo  "<div class=\"alert alert-success alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <h4><i class=\"icon fa fa-check\"></i> Berhasil Menambahkan Data..!</h4>
                </div>";
    }
    else if($success == 2){
        echo  "<div class=\"alert alert-success alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <h4><i class=\"icon fa fa-check\"></i> Berhasil Mengupdate Data..! !</h4>
                </div>";
    }
    else if($success == 0){
        echo  "<div class=\"alert alert-danger alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <h4><i class=\"icon fa fa-check\"></i> Gagal Meng-upload data, periksa kembali file format atau ukuran !</h4>
                </div>";
    }
     else if($success == 4){
        echo  "<div class=\"alert alert-warning alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <h4><i class=\"icon fa fa-check\"></i> Berhasil Menghapus Data </h4>
                </div>";
    }
}

?>