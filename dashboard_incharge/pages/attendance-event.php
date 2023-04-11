<!DOCTYPE html>
<html lang="en">
  
<?php

include("library/attendance/call_function.php");
require_once("../database/db_conn.php");
?>

<body>

  <!-- Main content -->
  <section class="content">
    <div class="row mb-2 mt-2">
      <div class="col-12">
        <button class="btn text-white" id="add" onclick="downloadPDF()"><i class="fas fa-download"></i> Download PDF</button>
        <button class="btn btn-danger" onclick="confirmDelete()"><i class="fas fa-trash-alt"></i> Delete Record</button>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-light">
            <h3 class="card-title"><strong>Online Attendance Record</strong></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-responsive-xl table-bordered">
              <thead>
                <?php call_fields() ?>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $sql = mysqli_query($conn, "SELECT * FROM online_attendance");
                while ($getData = mysqli_fetch_array($sql)) {
                  $i++;
                ?>

                  <td><?php echo $getData['lastname']; ?></td>
                  <td><?php echo $getData['firstname']; ?></td>
                  <td><?php echo $getData['login_type']; ?></td>
                  <td><?php echo $getData['time_in']; ?></td>

                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="col-12 mt-2 mb-2">
            <p class="text-start"><a href=".?page=home" class="text-decoration-none">Back to Homepage</a> </p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  </div>
  <!-- /.content -->
  
  <script src="js/jspdf.js"></script>
  <script src="js/colvis.js"></script>
  <script src="js/delete_record.js"></script>

</body>

</html>