<?php
include '../config/conn.php';
include 'error.php';
$q = mysqli_query($conn, "SELECT * FROM tb_slides ORDER BY id DESC LIMIT 5");
$aksi="module/mod_slides/slide_action.php";
$pg = @$_GET['act'];
if($pg == 'add'){?>
       <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Slides</h3>
            </div>
             <?php echo "<form method=\"POST\" enctype=\"multipart/form-data\" action=$aksi?mod=slides&act=add>"; ?> 
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">File Images</label>
                  <input type="file" id="exampleInputFile" name="image" required><br>
                  <span> * Ukuran slide 1300 x 500 pixel</span>
                </div>
                <div class="form-group">
                    <label>Active ?</label>
                  <div class="radio">
                    <label>
                      <input type="radio" id="optionsRadios1" name="active" value="Y" checked >
                      Yes
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" id="optionsRadios2" name="active" value="N">
                      No
                    </label>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <input type="submit" name="submit" value="SAVE" class="btn btn-primary">
              </div>
            </form>
          </div>


<?php
} else if($pg == 'update'){ ?>
     <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Slides </h3>
            </div>
             <?php 
             $id = $_GET['id'];
             echo "<form method=POST enctype=\"multipart/form-data\" action=$aksi?mod=slides&act=update&id=$_GET[id]>"; 
             $y = mysqli_query($conn,"SELECT * FROM tb_slides WHERE id=".$id);
             while($z = mysqli_fetch_array($y)){
             ?> 
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">File Images</label>
                  <input type="file" id="exampleInputFile" name="image">
                  <input type="hidden" name="image2" value=<?php echo $z['image']; ?> >
                </div>
                <div class="form-group">
                    <label>Active ?</label>
                  <div class="radio">
                    <label>
                      <input type="radio" id="optionsRadios1" name="active" value="Y" checked >
                      Yes
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" id="optionsRadios2" name="active" value="N">
                      No
                    </label>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit2">Save Changes</button>
              </div>
            </form>
          </div>


<?php } }else { ?>
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
                <h3 class="box-title">Data Slides</h3>
                <?php echo 
                "<a href=\"?mod=slides&act=add\" class=\"btn btn-large btn-primary\" style=\"float:right;\">       Tambah Slides &nbsp;<i class=\"fa fa-plus-circle\"></i></a>";
                ?>
            </div>
        <div class="box-body" style="padding-left: 30px;">
            <table id="data-slides" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Active</th>
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
                        <td> <?php echo "<a target=”_blank” href=\"../../../anugerahtech/img/slide/".$r['image']."\"> ".$r['image']."</a>" ?></td>
                        <td> <?php $c = $r['active'];
                                    if($c == 'Y'){
                                        $c = 'Active';
                                        echo "<span class=\"badge bg-green\">$c</span>";
                                    }
                                    else{
                                        $c = 'Not Active';
                                        echo "<span class=\"badge bg-red\">$c</span>";
                                    }
                            ?>
                        </td>               
                        <td> 
                              <?php echo 
                                    "<a href=\"?mod=slides&act=update&id=$r[id]\"
                                                class=\"btn btn-success\">
                                                <i class=\"fa fa-edit\"></i></a> 
                                    <a href=\"$aksi?mod=slides&act=delete&id=$r[id]\"
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
<?php } ?>

    