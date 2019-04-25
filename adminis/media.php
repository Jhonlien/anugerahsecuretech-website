<?php
  include '../config/conn.php';
  session_start();
  if(empty($_SESSION['username'])){
    header("location:index.php");
  }
  $nama = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo ucwords($_GET['mod']); ?> | Anugerah Security Technology</title>
  <link rel="apple-touch-icon" sizes="180x180" href="../img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../img/favicons/favicon-16x16.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="component/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="component/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="component/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="component/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" 
        href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>A</b>T</span>
      <span class="logo-lg"><b>Anugerah</b>Technology</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <!--  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a> -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="component/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ucwords($nama); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="component/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  <?php echo ucwords($nama); ?>
                  <small><a href="/anugerahtech/" class="btn" style="color: white;" target="_blank">View Web</a></small>
                </p>
              </li>
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="media.php?mod=profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="component/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucwords($_SESSION['username']);?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> 
            Online
          </a>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
      <?php
        include '../config/conn.php';
        global $conn;
        $query = mysqli_query($conn, "SELECT * FROM tb_menus WHERE aktif = 'Y' ");
        $mod = $_GET['mod'];
        while($menu = mysqli_fetch_array($query)){ 
            if($mod == $menu['nama_menu']){?>
                <li class="active">
                  <a href="media.php<?php echo $menu['link_menu']; ?>">
                    <?php echo ucwords($menu['nama_menu']); ?>
                </a>
              </li>
            <?php 
              } else { 
            ?>
                  <li>
                  <a href="media.php<?php echo $menu['link_menu']; ?>">
                    <?php echo ucwords($menu['nama_menu']); ?>
                </a>
                </li>
            <?php
              }
            ?>
          
        <?php } ?>
     </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?php echo ucwords($_GET['mod']); ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active"><?php echo ucwords($_GET['mod']); ?>  </li>
      </ol>
    </section>

    <section class="content container-fluid">
    	<?php
    		include 'content.php';
    	?>
    </section>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <?php 
      date_default_timezone_set("Asia/Jakarta");
      echo date("d M Y h:i:s");
      ?>
    </div>
    <strong>Copyright &copy; 2019 <a href="#">Anugerah Security Technology</a>.</strong> All rights reserved.
  </footer>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
        $('#data-slides').DataTable();
        $('#data-services').DataTable();
        $(".confirm").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
    });
</script>
</script>
<!-- <script src="component/bower_components/jquery/dist/jquery.min.js"></script> -->
<script src="component/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="component/dist/js/adminlte.min.js"></script>
</body>
</html>
