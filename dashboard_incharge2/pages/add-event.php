<!DOCTYPE html>
<html lang="en">
<?php
require_once("../database/db_conn.php");
?>
<body>
<div class="container-fluid p-md-2">
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h3 class="card-title"><strong>Create Event</strong></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <?php
        $userID = $_SESSION['UserID'];
        $sql = mysqli_query($conn, "SELECT * FROM registered_incharge WHERE department = 'ENGINEERING'");
        $getData = mysqli_fetch_array($sql);
        ?>

        <form action=".?folder=action/&page=save-event" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="eventType">Event Type:</label>
                    <select class="form-control" name="eventType" id="eventType" required>
                        <option selected>Choose type</option>
                        <option>MEETING</option>
                        <option>SEMINAR</option>
                        <option>ACTIVITY</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="towho">To:</label>
                    <select class="form-control" name="towho[]" id="towho" required>
                        <option selected> Choose person involved</option>
                        <option value="1ST YEAR">1ST YEAR STUDENTS</option>
                        <option value="2ND YEAR">2ND YEAR STUDENTS</option>
                        <option value="3RD YEAR">3RD YEAR STUDENTS</option>
                        <option value="4TH YEAR">4TH YEAR STUDENTS</option>
                        <option value="STUDENT"> ALL ENGINEERING STUDENT</option>
                        <option value="EMPLOYEE">EMPLOYEE</option>
                        <option value="GUEST">GUEST</option>
                        <option value="STUDENT AND EMPLOYEE">STUDENT AND EMPLOYEE</option>
                        <option value="STUDENT AND GUEST">STUDENT AND GUEST</option>
                        <option value="EMPLOYEE AND GUEST">EMPLOYEE AND GUEST</option>
                        <option value="EMPLOYEE STUDENT GUEST">SELECT ALL</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="fromwho">From:</label>
                    <input type="text" class="form-control" name="fromwho" id="fromwho" value="<?php echo $getData['department']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="eventSubject">Subject:</label>
                    <input type="text" class="form-control" name="eventSubject" id="eventSubject" placeholder="Enter your subject" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="venue">Venue:</label>
                    <input type="text" class="form-control" name="venue" id="venue" placeholder="Enter your venue" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="date">Date:</label>
                    <input type="date" class="form-control" name="date" id="date"required>
                </div>
            </div>
            <div class="form-col">
                <div class="form-group col-md-12 p-0">
                    <label for="agenda" class="form-label">Agenda:</label>
                    <textarea class="form-control" rows="3" name="agenda" id="agenda" placeholder="Add your agenda" required></textarea>
                </div>
                <div class="image">
                    <label for="image">Upload Doc File:</label>
                    <input type="file" name="file" accept=".pdf, .docx, .xlsx" id="image">
                </div>

                <div class="buttons">
                    <button type="submit" class="btn text-white" id="save">Post</button>
                    <button type="reset" class="btn btn-secondary" onclick="window.location.href='.?page=registered-event'">Close</button>
                </div>
                
        </form>
        </div>
        <div class="col-12 mt-4 mb-2">
            <p class="text-start"><a href=".?page=registered-event" class="text-decoration-none"> Go Back</a> </p>
        </div>
    </div>

</div>
</div>
</div>

<script src="js/subject.js"></script>
<script src="js/venue.js"></script>
<script src="js/to.js"></script>


<?php
if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'large') {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'The image size is too large to upload!'
        })
    </script>
<?php
    unset($_SESSION['validate']);
}
?>


<?php
if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'not-allowed') {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'The file is not allowed to upload!'
        })
    </script>
<?php
    unset($_SESSION['validate']);
}
?>

</body>
</html>
