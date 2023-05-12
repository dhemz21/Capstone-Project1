<?php
// Set cache limiter to prevent caching
session_cache_limiter("nocache");

session_start();

// if(isset($_SESSION['IDnumber'])==0)  
if (!isset($_SESSION['IDnumber']) || !$_SESSION['IDnumber']){
    header('location: dashboard_incharge/index.php');
    exit;
} else {

?>
  <!DOCTYPE html>
  <html lang="en">
  <!-- Calling the header -->
  <?php include('include/head.php') ?>
  <!-- End -->

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <!-- Calling Navbar from the include folder-->
      <?php include('include/navbar.php') ?>
      <!-- end -->

      <!-- Calling Main Sidebar Container from the include folder/Main_SideBar -->
      <?php include('include/Main_Sidebar/main_Sidebar.php') ?>
      <!-- End -->

      <!-- Calling the Content-Wrapper from the include folder -->
      <?php include('include/content_wrapper.php') ?>
      <!-- End -->

      <!-- DYNAMIC PAGE SECTION -->
      <?php
      $include_folder = isset($_GET['folder']) ? $_GET['folder'] : 'pages/';
      $page = isset($_GET['page']) ? $_GET['page'] : 'home';
      require_once($include_folder . $page . '.php');
      ?>
      <!-- DYNAMIC PAGE SECTION END -->

      <!-- Calling the footer  from the include folder -->
      <?php include('include/footer.php') ?>


      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    
  </body>

  </html>
<?php } ?>