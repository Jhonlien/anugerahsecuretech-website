<?php
include '../config/conn.php';
global $conn;
$users = mysqli_query($conn, "SELECT * FROM tb_admins");
$portofolio = mysqli_query($conn, "SELECT * FROM tb_portofolio");
$files = mysqli_query($conn, "SELECT * FROM tb_files");
$client = mysqli_query($conn, "SELECT * FROM tb_client");
?>

<div class="row">
  <div class="col-lg-3 col-xs-5">
  <div class="small-box bg-aqua">
    <div class="inner">
      <h3> <?php echo mysqli_num_rows($users); ?></h3>
      <p> Users</p>
    </div>
    <div class="icon small">
      <i class="fa fa-user"></i>
    </div>
    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
  </div>
</div>

<div class="row">
  <div class="col-lg-3 col-xs-6">
  <div class="small-box bg-orange">
    <div class="inner">
      <h3> <?php echo mysqli_num_rows($portofolio); ?></h3>
      <p> Portofolio</p>
    </div>
    <div class="icon">
      <i class="fa fa-ellipsis-v"></i>
    </div>
   <!--  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
  </div>
</div>

<div class="row">
  <div class="col-lg-3 col-xs-6">
  <div class="small-box bg-purple">
    <div class="inner">
      <h3> <?php echo mysqli_num_rows($files); ?> </h3>
      <p> Files </p>
    </div>
    <div class="icon">
      <i class="fa fa-file"></i>
    </div>
   <!--  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
  </div>
</div>

<div class="row">
  <div class="col-lg-2 col-xs-6">
  <div class="small-box bg-red">
    <div class="inner">
      <h3> <?php echo mysqli_num_rows($client); ?> </h3>
      <p> Client</p>
    </div>
    <div class="icon">
      <i class="fa fa-comments"></i>
    </div>
    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
  </div>
</div>