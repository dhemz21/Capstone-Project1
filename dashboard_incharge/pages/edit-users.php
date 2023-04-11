<div class="container">
<?php
        if (isset($_GET['success']) >= 1) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            User information Successully Updated!
                            <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                                <span aria-hidden='true'>&times</span>
                            </button>
                    </div>";
        } elseif (isset($_GET['error']) >= 1) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Error Updating User's Information
                            <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                                <span aria-hidden='true'>&times</span>
                            </button>
                    </div>";
        } else {
        }
        ?>
    <div class="card">
        <div class="card-header bg-warning">
            <h3 class="card-title"><strong>Update Users Information</strong></h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <form action=".?folder=action/&page=update-users" method="POST">
                <?php

                require_once("../database/db_conn.php");
                $Userid = $_GET['UserID'];
                $query = mysqli_query($conn, "SELECT * FROM registered_users where UserID = '$Userid'");
                while ($getData = mysqli_fetch_array($query)) {
                ?>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" name="UserID" value="<?php echo $getData['UserID']; ?>">
                            <label for="idnumber">IDNumber</label>
                            <input type="text" class="form-control" name="IDnumber" value="<?php echo $getData['IDnumber']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" name="Firstname" value="<?php echo $getData['Firstname']; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" name="Lastname" value="<?php echo $getData['Lastname']; ?>" required>
                        </div>
                
                        <div class="col-md-6">
                            <label for="depart">Departments</label>
                            <div class="input-group mb-2">
                                <select class="form-control" id="inputState" name="depart" value="<?php echo $getData['depart']; ?>" required>
                                    <option selected disabled value="">Departments</option>
                                    <option>COMPUTER STUDIES</option>
                                    <option>ENGINEERING</option>
                                    <option>EDUCATION</option>
                                    <option>TECHNOLOGY</option>
                                </select>
                            </div>
                        </div>
   
                    </div>
                <?php } ?>
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-danger">Clear</button>
                <button type="reset" class="btn btn-secondary" onclick="window.location.href='.?page=registered-users'">Close</button>
            </form>

        </div>
        <div class="col-12 mt-2 mb-2" id="go-btn">
                <p class="text-start"><a href=".?page=registered-users" class="text-decoration-none"> Go Back</a> </p>
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
                title: 'User Updated',
                text: 'You successfully update your information! '
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
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong! '
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>