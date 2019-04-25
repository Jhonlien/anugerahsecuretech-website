<?php
include '../config/conn.php';
include 'error.php';
$q = mysqli_query($conn, "SELECT * FROM tb_files");
$aksi="module/mod_files/files_action.php";
$pg = @$_GET['act'];
if($pg == 'add'){?>
	<div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Files</h3>
            </div>
             <?php 
             echo "<form method=\"POST\" enctype=\"multipart/form-data\" action=$aksi?mod=files&act=add>"; 
             ?> 
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File</label>
                  <input type="file" id="exampleInputFile" name="files" required>
                </div>   

                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control" name="category" required>
                    <option value="COMPANY">Company Profile</option>
                    <option value="DATASHEET">Datasheet</option>
                    <option value="KATALOG">Katalog</option>
                  </select>
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
    <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Services</h3>
            </div>
             <?php 
             $id = $_GET['id'];
             echo "<form method=POST enctype=\"multipart/form-data\" action=$aksi?mod=files&act=update&id=$_GET[id]>";
             $y = mysqli_query($conn,"SELECT * FROM tb_files WHERE id=".$id);
             while($z = mysqli_fetch_array($y)){
             ?> 
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title" required value=<?php echo $z['title'] ?> >
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File</label>
                  <input type="file" id="exampleInputFile" name="files">
                  <input type="hidden" id="exampleInputFile" name="files2" required value=<?php echo $z['files'] ?> >
                </div>   

                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control" name="category">
                    <option value="COMPANY">Company Profile</option>
                    <option value="DATASHEET">Datasheet</option>
                    <option value="KATALOG">Katalog</option>
                  </select>
                </div> 
              </div>
              <div class="box-footer">
                <input type="submit" name="submit" value="SAVE" class="btn btn-primary">
              </div>
            </form>
          </div>
<?php
} }
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
                <h3 class="box-title">Data File</h3>
                <?php echo 
                "<a href=\"?mod=files&act=add\" class=\"btn btn-large btn-primary\" style=\"float:right;\">       Tambah Files &nbsp;<i class=\"fa fa-plus-circle\"></i></a>";
                ?>
            </div>
        <div class="box-body" style="padding-left: 30px;">
            <table id="data-services" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>File</th>
                        <th>Category</th>
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
                        <td> <?php echo $r['title'];?></td> 
                        <td> <?php echo $r['date_publish'];?></td> 
                        <td> <?php echo "<a target=”_blank” href=\"../../../anugerahtech/files/".$r['files']."\"> ".$r['files']."</a>" ?></td>
                        <td> <?php echo $r['category'];?></td>     
                 
                        <td> 
                              <?php echo 
                                    "<a href=\"?mod=files&act=update&id=$r[id]\"
                                                class=\"btn btn-success\">
                                                <i class=\"fa fa-edit\"></i></a> 
                                    <a href=\"$aksi?mod=files&act=delete&id=$r[id]\"
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
