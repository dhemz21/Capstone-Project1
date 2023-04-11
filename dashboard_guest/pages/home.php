<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Welcome Alert -->
        <div class="alert alert-primary alert-dismissible fade show rounded-0 shadow-none" role="alert">
            <p>
                Hi! <strong><?php echo $_SESSION['Firstname'] ?></strong> Welcome to your Dashboard, <strong><?php echo $_SESSION['login_type'] ?></strong> for EVSU OCC!
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    
            <!-- TABLE INFORMATION SECTION -->
            <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box rounded-0 shadow-sm text-white" id="box1">
                    <div class="inner">
                        <h4>Qr Code</h4>
                        <h3>1</h3>
                        <p>Your Qr Code</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-qrcode"></i>
                    </div>
                    <a href=".?page=qr-code" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box rounded-0 shadow-sm text-white" id="box2">
                    <div class="inner">
                        <h4>School Events</h4>
                        <?php
                        require_once("../database/db_conn.php");
                        $query = "SELECT COUNT(*) FROM incharge_add_event";
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                        $count = mysqli_fetch_row($result);

                        echo '<h3>' . $count[0] . '</h3> ';
                        ?>
                    
                        <p><strong>Total of Events</strong> </p>
                    </div>
                    <div class="icon">
                    <i class="nav-icon fas fa-table"></i>
                    </div>
                    <a href=".?folder=pages/&page=registered-post" class="small-box-footer">View Table <i class="fas fa-arrow-circle-right"></i></a>
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
