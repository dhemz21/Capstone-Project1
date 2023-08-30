<!DOCTYPE html>
<html lang="en">

<?php
include("../../src/libraries/call_function4.php");
require_once("../../database/db_conn.php");

?>
<body>
  
<!-- Main content -->
<section class="content">
    <!-- DataTable -->
    <div class="row">
    <div class="col">
      <?php
      if (isset($_GET['success'])) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        Event Successfully Added!
                        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                            <span aria-hidden='true'>&times</span>
                        </button>
                </div>";
      } elseif (isset($_GET['successrem']) >= 1) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Event Successfully Removed!
                        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                            <span aria-hidden='true'>&times</span>
                        </button>
                </div>";
      } else {
      }
      ?>
    </div>
  </div>
  <!-- Add Section -->
  <div class="row mb-2 mt-2">
    <div class="col-12">
      <a href=".?page=add-event" class="btn text-white" id="add"><i class="fas fa-plus"></i> Add Event</a>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card shadow-sm">
        <div class="card-header bg-light">
          <h3 class="card-title"><i class="fa fa-list"></i> <strong> Added Events</strong></h3>
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
              $sql = mysqli_query($conn, "SELECT * FROM incharge_add_event WHERE fromwho='ENGINEERING'");
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
                  <td><?php echo $getData['agenda']; ?></td>
                  <td><a href="../../src/private/files/<?php echo $getData['file']; ?>" target="_blank"><?php echo basename($getData['file']); ?></a></td>
                  <td><?php echo $getData['date']; ?></td>
                  <td class="text-left py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                      <a href=".?page=edit-event&userID=<?php echo $getData['userID']; ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                      <a onclick="return confirm('Are you sure you want to delete this Event?')" href=".?folder=action/&page=delete-event&userID=<?php echo $getData['userID']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </div>
                  </td>
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

<script src="js/datatable.js"></script>

<?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'successful') {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Successfully Added',
                text: 'You successfully add a Post '
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>
    
    <?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'delete') {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Post Deleted',
                text: 'You successfully delete your Post! '
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>

<?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'error-delete') {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong! '
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>

<?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'error') {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong! '
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>
</body>
</html>
</div>


