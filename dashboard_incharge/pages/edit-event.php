<style>
  .buttons{
    margin-left: 15px;
    margin-bottom: 0;
    padding-bottom: 0;
  }
  .image{
        margin-left: 15px;
        margin-bottom: 10px;
    }
    #go-btn{
        margin-left: 15px;
    }
</style>
<div class="container-fluid p-2">
<?php
        if (isset($_GET['success']) >= 1) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            Post Successully Updated!
                            <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                                <span aria-hidden='true'>&times</span>
                            </button>
                    </div>";
        } elseif (isset($_GET['error']) >= 1) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Error Updating your Post Information
                            <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                                <span aria-hidden='true'>&times</span>
                            </button>
                    </div>";
        } else {
        }
        ?>
    <div class="card">
        <div class="card-header text-dark">
            <h3 class="card-title"><strong>Update Event</strong></h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <form action=".?folder=action/&page=update-event" method="POST">
                <?php

                require_once("../database/db_conn.php");
                $userId = $_GET['userID'];
                $query = mysqli_query($conn, "SELECT * FROM incharge_add_event where userID = '$userId'");
                while ($getData = mysqli_fetch_array($query)) {
                ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <input type="hidden" name="userID" value="<?php echo $getData['userID']; ?>">
                        <label for="eventType">Event Type:</label>
                        <select class="form-control" name="eventType" id="eventType" required>
                            <option selected><?php echo $getData['eventType']; ?></option>
                            <option>MEETING</option>
                            <option>SEMINAR</option>
                            <option>ACTIVITY</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="towho">To:</label>
                        <select class="form-control" name="towho[]" id="towho" required>
                            <option selected></option>
                            <option value="1ST YEAR">1ST YEAR STUDENTS</option>
                            <option value="2ND YEAR">2ND YEAR STUDENTS</option>
                            <option value="3RD YEAR">3RD YEAR STUDENTS</option>
                            <option value="4TH YEAR">4TH YEAR STUDENTS</option>
                            <option value="STUDENT"> ALL STUDENT</option>
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
                        <input type="text" class="form-control" name="fromwho" id="fromwho" value="<?php echo $getData['fromwho']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="eventSubject">Subject:</label>
                        <input type="text" class="form-control" name="eventSubject" id="eventSubject" value="<?php echo $getData['eventSubject']; ?>"required>
                        </div>
                    <div class="form-group col-md-6">
                        <label for="venue">Venue:</label>
                        <input type="text" class="form-control" name="venue" id="venue" value="<?php echo $getData['venue']; ?>"required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" name="date" id="date" value="<?php echo $getData['date']; ?>" required>
                    </div>
                </div>
                <div class="form-col">
                    <div class="form-group col-md-12 p-0">
                        <label for="agenda" class="form-label">Agenda:</label>
                        <textarea class="form-control" rows="3" name="agenda" id="agenda" required><?php echo $getData['agenda']; ?></textarea>
                    </div>
                </div>
                <?php } ?>
                <div class="buttons">
                <button type="submit" class="btn text-white" id="save">Update</button>
                <button type="reset" class="btn btn-secondary" onclick="window.location.href='.?page=registered-event'">Close</button>
                </div>
            </form>
        </div>
        <div class="col-12 mt-2 mb-2" id="go-btn">
                <p class="text-start"><a href=".?page=registered-event" class="text-decoration-none"> Go Back</a> </p>
                </div>
    </div>
    
    </div>
    </div>
</div>

<?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'update') {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Post Updated',
                text: 'You successfully update your Post! '
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




