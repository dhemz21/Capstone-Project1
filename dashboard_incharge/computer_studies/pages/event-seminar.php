<!DOCTYPE html>
<html lang="en">

<?php
include("../assets/library/call_function3.php");
require_once("../../database/db_conn.php");

?>
<body>
  
<!-- Main content -->
<section class="content">
  <!-- Add Section -->
  <div class="row">
    <div class="col-12">
      <div class="card shadow-sm">
        <div class="card-header bg-light">
          <h3 class="card-title"><i class="fa fa-list"></i> <strong> seminar list</strong></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-responsive table-bordered">
            <thead>
              <?php call_fields() ?>
            </thead>
            <tbody>
              <?php
              $i = 0;
              $sql = mysqli_query($conn, "SELECT * FROM incharge_add_event WHERE eventType='SEMINAR' AND fromwho='COMPUTER STUDIES'");
              while ($getData = mysqli_fetch_array($sql)) {
                $i++;
              ?>
                <tr>
                <td><?php echo $i; ?></td>
                  <td><?php echo $getData['eventType']; ?></td>
                  <td><?php echo $getData['towho']; ?></td>
                  <td><?php echo $getData['fromwho']; ?></td>
                  <td><?php echo $getData['eventSubject']; ?></td>
                  <td><?php echo $getData['venue']; ?></td>
                  <td>
                  <span id="status-<?php echo $getData['userID']; ?>"><?php echo $getData['eventStatus']; ?></span>
                  </td>
                  <td>
                  <div class="d-grid gap-2">
                    <a id="scanqr-link-<?php echo $getData['userID']; ?>" href=".?page=event-scan2&userID=<?php echo $getData['userID']; ?>" class="btn btn-primary scanqr-btn"><i class="fas fa-qrcode" id="qrcode"></i> Scan Qr</a>
                    <button id="active-btn-<?php echo $getData['userID']; ?>" class="btn btn-success active-btn text-white">Active</button>
                  </div>
                </td>
                <td>
                  <div class="d-flex">
                  <a <?php echo $getData['userID']; ?>" href=".?page=attendance-event2&userID=<?php echo $getData['userID']; ?>" class="btn btn-warning text-white scanqr-btn"> Table</a>
                  </div>
                </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="col-12 mt-2 mb-2">
                <p class="text-start"><a href=".?page=event-list" class="text-decoration-none">Go Back</a> </p>
                </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

<script src="js/eventStatus.js"></script>

</body>
</html>
</div>


