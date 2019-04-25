<?php
include '../config/conn.php';
include 'error.php';
$q = mysqli_query($conn, "SELECT * FROM tb_portofolio");
$aksi="module/mod_portofolio/portofolio_action.php";
$pg = @$_GET['act'];
if($pg == 'add'){?>
	<div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Portofolio</h3>
            </div>
             <?php 
             echo "<form method=\"POST\" enctype=\"multipart/form-data\" action=$aksi?mod=portofolio&act=add>"; 
             ?> 
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Place</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Place" name="place" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Cover</label>
                  <input type="file" id="exampleInputFile" name="cover" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image 1</label>
                  <input type="file" id="exampleInputFile" name="image1" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image 2</label>
                  <input type="file" id="exampleInputFile" name="image2" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image 3</label>
                  <input type="file" id="exampleInputFile" name="image3" required>
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
                "<a href=\"?mod=portofolio&act=add\" class=\"btn btn-large btn-primary\" style=\"float:right;\">       Tambah Files &nbsp;<i class=\"fa fa-plus-circle\"></i></a>";
                ?>
            </div>
        <div class="box-body" style="padding-left: 30px;">
            <table id="data-services" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Place</th>
                        <th>Cover</th>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Image 3</th>
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
                        <td> <?php echo $r['place'];?></td> 
                        <td> <?php echo "<a target=”_blank” href=\"../../../anugerahtech/img/portofolio/".$r['cover'] ."\"> ".$r['cover']."</a>" ?></td>
                        <td> <?php echo "<a target=”_blank” href=\"../../../anugerahtech/img/portofolio/".$r['image1']."\"> ".$r['image1']."</a>" ?></td>
                        <td> <?php echo "<a target=”_blank” href=\"../../../anugerahtech/img/portofolio/".$r['image2']."\"> ".$r['image2']."</a>" ?></td>
                        <td> <?php echo "<a target=”_blank” href=\"../../../anugerahtech/img/portofolio/".$r['image3']."\"> ".$r['image3']."</a>" ?></td>
                        <td> 
                              <?php echo 
                                    "<a href=\"$aksi?mod=portofolio&act=delete&id=$r[id]\"
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
