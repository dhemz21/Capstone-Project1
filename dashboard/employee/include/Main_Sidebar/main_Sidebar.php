<!DOCTYPE html>
<html lang="en">
<?php
  include_once('action/display-profile.php');
  include_once('action/admin-post-count.php');
  ?>
  

<body>
<aside class="main-sidebar sidebar-dark-danger elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="../../src/assets/img/evsu.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">EVSU-OC</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image" id="profile-image">

        <img src="../../src/private/profiles/<?php echo $image; ?>" alt="Add Photo">
      </div>
      <div class="info">
        <a href=".?page=employee-info" class="d-block"><?php echo $_SESSION['Firstname'] ?> <?php echo $_SESSION['Lastname'] ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <div class="row">
          <div class="col-12 mb-2 ">
            <div id="btn-menu">
              <a href=".?folder=pages/&page=employee-info" class="btn rounded-0 text-white w-100" id="edit-profile"><i class="nav-icon fas fa-edit"></i> Edit Profile</a>
            </div>
          </div>
        </div>
        
        
        <!-- End -->
        <li class="nav-item menu-open">
          <a href="index.php" class="nav-link active rounded-0 shadow-none">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

      <a href=".?page=registered-post">
      <button type="button" class="btn  mt-2 mb-1 w-100 rounded-0 text-white" id="btn-badge">
        School Events <span class="badge badge-danger"><?php echo $count; ?></span>
      </button>
      </a>
        <li class="nav-item">
          <a href=".?page=qr-code" class="nav-link">
          <i class="nav-icon fas fa-qrcode"></i>
            <p>
            QR Code Gallery
            </p>
          </a>
        </li>
      <li class="nav-item">
        <a href="action/logout.php?page=logout" class="nav-link">
          <i class="nav-icon fa-solid fa-right-from-bracket"></i>
          <p>
            Logout
          </p>
        </a>
      </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

</body>
</html>