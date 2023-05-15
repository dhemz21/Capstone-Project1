<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Welcome Alert -->
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <p>
                Hi! <strong><?php echo $_SESSION['firstname'] ?>, Welcome to your Dashboard.
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

            <!-- TABLE INFORMATION SECTION -->
            <div class="row">
                
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box shadow-sm text-white" id="box1">
                    <div class="inner">
                        <h4>Registered Users</h4>
                        <?php
                         require_once("../database/db_conn.php");
                          $query = 'SELECT COUNT(*) AS total FROM registered_users WHERE department="COMPUTER STUDIES"';
                          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        
                          $row = mysqli_fetch_assoc($result);
                          $totalusers = $row['total'];

                          if (empty($totalusers)) {
                              echo '<h3> 0 </h3> ';
                          } else {
                              echo '<h3>' . $totalusers . '</h3> ';
                          }

                        ?>
                    

                        <p><strong>Total Users</strong> </p>
                    </div>
                    <div class="icon">
                    <i class="nav-icon fas fa-user-tie"></i> 
                    </div>
                    <a  class="small-box-footer"> <i class="fas fa-check-circle"></i></a>
                                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box text-white shadow-sm" id="box2">
                    <div class="inner">
                        <h4>Added Events</h4>
                    
                        <?php
                            require_once("../database/db_conn.php");
                            $query = "SELECT COUNT(*) AS total FROM incharge_add_event";
                            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                            $row = mysqli_fetch_assoc($result);
                            $totalposts = $row['total'];

                            if (empty($totalposts)) {
                                echo '<h3> 0 </h3> ';
                            } else {
                                echo '<h3>' . $totalposts . '</h3> ';
                            }
                            ?>


                        <p><strong>Total Events</strong> </p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-file-circle-plus"></i>
                    </div>
                    <a href=".?folder=pages/&page=registered-event" class="small-box-footer">View Table <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box text-white shadow-sm" id="box3">
                    <div class="inner">
                        <h4>Event Records</h4>
                        <?php
                        require_once("../database/db_conn.php");
                        $query = "SELECT COUNT(*) FROM online_attendance";
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                        $count = mysqli_fetch_row($result);

                        echo '<h3>' . $count[0] . '</h3> ';
                        ?>
                                         
                        <p><strong>Total Online Attendees</strong> </p>
                    </div>
                    <div class="icon">
                    <i class="nav-icon fas fa-table"></i>
                    </div>
                    <a href=".?folder=pages/&page=attendance-event" class="small-box-footer">View Table <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box text-white shadow-sm" id="box4">
                    <div class="inner">
                        <h4>History File</h4>
                        <?php
                            require_once("../database/db_conn.php");
                            $query = "SELECT COUNT(*) AS total FROM incharge_history";
                            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                            $row = mysqli_fetch_assoc($result);
                            $totalPDFs = $row['total'];

                            if (empty($totalPDFs)) {
                                echo '<h3> 0 </h3> ';
                            } else {
                                echo '<h3>' . $totalPDFs . '</h3> ';
                            }
                            ?>

                    
                        <p><strong>Total File</strong> </p>
                    </div>
                    <div class="icon">
                    <i class="nav-icon fas fa-table"></i>
                    </div>
                    <a href=".?folder=pages/&page=pdf-event" class="small-box-footer">View Table <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
  
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

<!-- TABLE INFORMATION SECTION END -->
