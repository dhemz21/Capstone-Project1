<!DOCTYPE html>
<html lang="en">

<?php
include("../../src/library/call_function.php");
require_once("../../database/db_conn.php");

?>
<body> 
<!-- Main content -->
<section class="content">
  <!-- Add Section -->

  <!-- DataTable -->
  <div class="row">
    <div class="col-12">
      <div class="card rounded-0 shadow-sm">
        <div class="card-header rounded-0 shadow-none">
          <h3 class="card-title text-dark"><i class="fa fa-list"></i><strong> School Events</strong></h3>
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
              $sql = mysqli_query($conn, "SELECT * FROM incharge_add_event");
              while ($getData = mysqli_fetch_array($sql)) {
                $i++;
              ?>
                <tr>
                  <td><?php echo $getData['eventType']; ?></td>
                  <td><?php echo $getData['towho']; ?></td>
                  <td><?php echo $getData['fromwho']; ?></td>
                  <td><?php echo $getData['eventSubject']; ?></td>
                  <td><?php echo $getData['venue']; ?></td>
                  <td><?php echo $getData['agenda']; ?></td>
                  <td><a href="../../src/private/files/<?php echo $getData['file']; ?>" target="_blank"><?php echo basename($getData['file']); ?></a></td>
                  <td><?php echo $getData['date']; ?></td>  
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
<!-- /.content -->
<script>
    setTimeout(function(){
    location.reload();
  }, 10000);
   </script>
<script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            $("#delete-table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["colvis"]
            }).buttons().container().appendTo('#delete-table_wrapper .col-md-6:eq(0)');
            $('#delete-table2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>
</html>
</div>


