<!DOCTYPE html>
<html lang="en">

<body>
<div class="container-fluid">
<div class="container" id="container-scanner">
    <div class="card-qr shadow-sm" id="card-qr">
        <h5 class="card-header text-dark rounded-0">Scanner for Seminar</h5>
        <div class="card-body">
            <form  method="post" action=".?folder=action/&page=save-event-seminar" novalidate>
                <?php
                require_once("../database/db_conn.php");
                $event_id = $_GET['userID'];
                $query = mysqli_query($conn, "SELECT * FROM incharge_add_event where userID = '$event_id'");
                 while ($getData = mysqli_fetch_array($query)) {
                ?>
                <div class="row">
                <input type="hidden" name="userID" value="<?php echo $getData['userID']; ?>">
                    <div class="col-12">
                        <div class="input-group mb-2">
                            <video id="preview" width="100%"> </video>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-2">
                                <input type="text" class="input form-control" name="text" id="text" readonly placeholder="Place your QR code in the camera" />
                            </div>
                        </div>
                        <hr>
                            <strong><?php echo $getData['eventType']; ?></strong>
                        <hr>
                        <p>Subject: <strong><?php echo $getData['eventSubject']; ?></strong></p>
                        <p>Date: <strong><?php echo $getData['date']; ?></strong></p>
                        <?php } ?>
            </form>
        </div>
    </div>
    
</div>
</div>
</div>
<div class="col-12 mt-2 mb-4">
<p class="text-start"><a href=".?page=event-seminar" class="text-decoration-none">Go Back</a> </p>
</div>
</div>

<?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'successful') {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: 'You successfully registered online!'
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>

<?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'offline-successful') {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: 'No internet! Your data has been saved locally'
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>

    
<?php
  if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'existed') {
  ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Data Existed ',
        text: 'This data is already existed!'
      })
    </script>
  <?php
    unset($_SESSION['validate']);
  }
  ?>

<?php
  if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'offline-existed') {
  ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Data Existed ',
        text: 'This data is already existed!'
      })
    </script>
  <?php
    unset($_SESSION['validate']);
  }
  ?>


    <!-- QR CODE VALIDATION SECTION -->
    <?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] != '') {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Invalid QR Code ',
                text: 'Please check your QR Code!'
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>
    <!-- END -->

<!-- QR CODE SCANNER SECTION -->
<script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview'),
            mirror: false,
            captureImage: true,
            rotation: 90
        });
        scanner.addListener('scan', function(content) {
            console.log(content);
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                // if the user has a rear/back camera 
                if(cameras[1]){
                    // Use that by default
                    scanner.start(cameras[1]);
                } else {
                    scanner.start(cameras[0]);
                }
             }else {
                console.error('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
        });

        scanner.addListener('scan', function(c) {
            document.getElementById('text').value = c;
            document.forms[0].submit();
        });
    </script>
    <!-- END -->
</body>
</html>

</div>
    </div>


