<?php
include '../config/conn.php';
include 'error.php';
$q = mysqli_query($conn, "SELECT * FROM tb_partner");
$aksi="module/mod_partner/partner_action.php";
$pg = @$_GET['act'];
if($pg == 'add'){?>
	<div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Partner</h3>
            </div>
             <?php 
             echo "<form method=\"POST\" enctype=\"multipart/form-data\" action=$aksi?mod=partner&act=add>"; 
             ?> 
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Logo</label>
                  <input type="file" id="exampleInputFile" name="logo[]" multiple required>
                </div>
              </div>
              <div class="box-footer">
                <input type="submit" name="submit" value="SAVE" class="btn btn-primary">
              </div>
            </form>
          </div>
<?php
}
else if($pg == 'update'){?>
<?php
}
else
{
?> 
<div class="row">
    <div class="col-xs-12">
    <div class="box">
            <div class="box-header" style="padding-left: 20px; padding-right: 20px;">
                <?php
                    if(isset($_GET['suc'])){
                        $success = $_GET['suc'];
                        echo success($success);
                    }
                    ?>
                <h3 class="box-title">Data Portofolio</h3>
                <?php echo 
                "<a href=\"?mod=partner&act=add\" class=\"btn btn-large btn-primary\" style=\"float:right;\">       Tambah Files &nbsp;<i class=\"fa fa-plus-circle\"></i></a>";
                ?>
            </div>
        <div class="box-body" style="padding-left: 30px;">
            <table id="data-services" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Logo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   <?php 
                   $no=1;
                    while($r = mysqli_fetch_array($q)){ 
                    ?>
                    <tr>
                        <td> <?php echo $no; ?></td>
                        <td> <?php echo "<a target=”_blank” href=\"../../../anugerahtech/img/partner/".$r['logo'] ."\"> ".$r['logo']."</a>" ?></td>
                        <td> 
                              <?php echo 
                                    "<a href=\"$aksi?mod=partner&act=delete&id=$r[id]\"
                                                class=\"btn btn-danger confirm\">
                                                <i class=\"fa fa-trash\"></i></a> ";
                                ?>
                        </td>
                    </tr>
                <?php $no++;}?>
               </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>



<?php 
} 
?>
