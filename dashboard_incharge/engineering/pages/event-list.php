<!DOCTYPE html>
<html lang="en">

<body>
    <section class="content">
        <div class="container-fluid mt-4">
            <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box text-white shadow-sm" id="box1">
                    <div class="inner">
                        <h4>Meeting Records</h4>
                        <?php
                        require_once("../../database/db_conn.php");
                        $query = "SELECT COUNT(*) FROM incharge_add_event WHERE eventType='MEETING' AND fromwho='ENGINEERING'";
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                        $count = mysqli_fetch_row($result);

                        echo '<h3>' . $count[0] . '</h3> ';
                        ?>
                                         
                        <p><strong>Total of Meetings</strong> </p>
                    </div>
                    <div class="icon">
                    <i class="nav-icon fas fa-table"></i>
                    </div>
                    <a href=".?folder=pages/&page=event-meeting" class="small-box-footer">View Activity <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box text-white shadow-sm" id="box2">
                    <div class="inner">
                        <h4>Seminar Records</h4>
                        <?php
                        require_once("../../database/db_conn.php");
                        $query = "SELECT COUNT(*) FROM incharge_add_event WHERE eventType='SEMINAR' AND fromwho='ENGINEERING'";
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                        $count = mysqli_fetch_row($result);

                        echo '<h3>' . $count[0] . '</h3> ';
                        ?>
                                         
                        <p><strong>Total of Seminars</strong> </p>
                    </div>
                    <div class="icon">
                    <i class="nav-icon fas fa-table"></i>
                    </div>
                    <a href=".?folder=pages/&page=event-seminar" class="small-box-footer">View Activity <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box text-white shadow-sm" id="box3">
                    <div class="inner">
                        <h4>Activity Records</h4>
                        <?php
                        require_once("../../database/db_conn.php");
                        $query = "SELECT COUNT(*) FROM incharge_add_event WHERE eventType='ACTIVITY' AND fromwho='ENGINEERING'";
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                        $count = mysqli_fetch_row($result);

                        echo '<h3>' . $count[0] . '</h3> ';
                        ?>
                                         
                        <p><strong>Total of Activities</strong> </p>
                    </div>
                    <div class="icon">
                    <i class="nav-icon fas fa-table"></i>
                    </div>
                    <a href=".?folder=pages/&page=event-activity" class="small-box-footer">View Activity <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


            </div>
        </div>
    </section>
</body>

</html>
 </div>
</div>
</div>