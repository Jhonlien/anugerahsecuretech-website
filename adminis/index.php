<?php
include 'error.php';
session_start();
if(isset($_SESSION['username'])){
  header("location:media.php?mod=dashboard");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Anugerah Security Tech | Admin Login</title>
  <link rel="apple-touch-icon" sizes="180x180" href="../img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../img/favicons/favicon-16x16.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="component/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="component/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="component/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="component/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="component/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index.php"><b>Admin</b><br>Anugerah Security Tech</a>
  </div>
  <?php
    if(isset($_GET['error'])){
      $error = $_GET['error'];
      echo error($error);
      include 'login.php';
    }  
    else { 
      include 'login.php'; 
    }
  ?>
<script src="component/bower_components/jquery/dist/jquery.min.js"></script>
<script src="component/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="component/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
