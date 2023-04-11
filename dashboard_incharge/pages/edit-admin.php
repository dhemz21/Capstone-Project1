<!DOCTYPE html>
<html lang="en">

<?php
include_once('action/display-profile.php');
?>
<body>
<div class="container-fluid pb-2">

<?php


if (isset($_GET['success']) >= 1) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        Information Successully Updated!
                        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                            <span aria-hidden='true'>&times</span>
                        </button>
                </div>";
} elseif (isset($_GET['error']) >= 1) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Error Updating your Information
                        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                            <span aria-hidden='true'>&times</span>
                        </button>
                </div>";
} else {
}
?>
<div class="card shadow-sm rounded-0">
    <div class="card-header text-dark">
        <h3 class="card-title"><strong>Update your Information</strong></h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body ">
        <form action=".?folder=action/&page=update-admin" method="POST">
            <?php

            require_once("../database/db_conn.php");
            $userID = $_SESSION['UserID'];
            $query = mysqli_query($conn, "SELECT * FROM registered_incharge WHERE UserID = '$userID'");
            while ($getData = mysqli_fetch_array($query)) {
            ?>

                <div class="profile-image">
                    <img src="profile/<?php echo $image; ?>" alt="Profile Picture">
                </div>
                <div class="btn-add">
                    <a href=".?page=admin-add-photo" class="btn text-white" id="edit">Add Photo</a>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="hidden" name="UserID" value="<?php echo $getData['UserID']; ?>">
                        <label for="user">Username</label>
                        <input type="text" class="form-control" name="user" value="<?php echo $getData['user']; ?>" required>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="password">Current Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0" id="basic-addon1" ><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your current password" required>
                            <div class="input-group-append">
                                <span class="input-group-text rounded-0" onclick="password_show_hide();">
                                    <i class="fa fa-eye" id="show_eye"></i>
                                    <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                </div>
            <?php } ?>
            <div class="col-12 mb-2">
                <p class="text-center"><a href=".?page=forgot-pass" class="text-decoration-none">Change Password?</a> </p>
            </div>
            <button type="submit" class="btn text-white" id="save">Save</button>
            <button type="reset" class="btn btn-secondary" onclick="window.location.href='.?page=admin-info'">Close</button>
        </form>

    </div>
    <div class="col-12 mt-3 mb-2">
        <p class="text-start"><a href=".?page=admin-info" class="text-decoration-none">Go Back</a> </p>
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
        title: 'Updated',
        text: ' Your password successully updated!'
    })
</script>
<?php
unset($_SESSION['validate']);
}
?>

<?php
if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'not-match') {
?>
<script>
  Swal.fire({
    icon: 'error',
    title: 'Error!',
    text: 'Inputed password not match, Please try again!'
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

<script>
function password_show_hide() {
    var x = document.getElementById("password");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }
}
</script>
    
</body>
</html>