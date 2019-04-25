<?php
include '../config/conn.php';

if($_GET['mod'] == 'dashboard')
{
		include 'module/mod_dashboard/dashboard.php';
}

else if($_GET['mod'] == 'portofolio')
{
  include 'module/mod_portofolio/portofolio.php';
}
else if($_GET['mod'] == 'slides')
{
  include 'module/mod_slides/slides.php';
}
else if($_GET['mod'] == 'profile'){
  include 'module/mod_profile/profile.php';
}
else if($_GET['mod'] == 'files'){
  include 'module/mod_files/files.php';
}
else if($_GET['mod'] == 'service'){
  include 'module/mod_service/service.php';
}
else if($_GET['mod'] == 'client'){
  include 'module/mod_client/client.php';
}
else if($_GET['mod'] == 'partner'){
  include 'module/mod_partner/partner.php';
}
else{
     ?>
    <h1>
        404 Error Page
      </h1>
    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
          </p>

          <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
        <!-- /.error-content -->
      </div>

<?php
}

?>



