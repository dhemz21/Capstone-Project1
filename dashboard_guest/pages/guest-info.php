<?php
include_once('action/display-profile.php');
?>

<!DOCTYPE html>
<html lang="en">

<body>
  <div class="container-fluid pb-3">
  <?php
    if (isset($_GET['success'])) {
      echo "<div class='alert alert-success alert-dismissible fade show rounded-0 shadow-none' role='alert'>
                        You successully updated your Information!
                        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                            <span aria-hidden='true'>&times</span>
                        </button>
                </div>";
    } elseif (isset($_GET['successrem']) >= 1) {
      echo "<div class='alert alert-danger alert-dismissible fade show rounded-0 shadow-none' role='alert'>
                        Guest Successfully Removed!
                        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                            <span aria-hidden='true'>&times</span>
                        </button>
                </div>";
    } else {
    }
    ?>
    <div class="card rounded-0 shadow-sm">
      <div class="card-header  rounded-0">
        <h3 class="card-title text-dark"><strong>Your Information</strong></h3>
      </div>
      <div class="card-body">
        <?php
        include_once("../database/db_conn.php");
        $userID = $_SESSION['UserID'];
        $sql = mysqli_query($conn, "SELECT * FROM registered_users WHERE UserID = '$userID'");
        while ($getData = mysqli_fetch_array($sql)) {

        ?>
          <form action=".?folder=action/&page=update-guest-info" method="POST" enctype="multipart/form-data">

            <div class="profile-image">
              <img src="profile/<?php echo $image; ?>" alt="Profile Picture">
            </div>
            <div class="btn-add">
              <a href=".?page=edit-guest&UserID=<?php echo $getData['UserID']; ?>" class="btn text-white rounded-0 shadow-none" id="edit">Edit Profile</a>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="hidden" name="UserID" value="<?php echo $getData['UserID']; ?>">
                <label for="username">Username</label>
                <input type="text" class="form-control rounded-0 " name="username" value="<?php echo $getData['username']; ?>" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control rounded-0 " name="email" value="<?php echo $getData['email']; ?>" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="fname">Firstname</label>
                <input type="text" class="form-control rounded-0 " name="fname" value="<?php echo $getData['Firstname']; ?>" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="lname">Lastname</label>
                <input type="text" class="form-control rounded-0 " name="lname" value="<?php echo $getData['Lastname']; ?>" readonly>
              </div>
  
              <div class="form-group col-md-12">
                <label for="password">Password</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-lock"></i></span>
                  </div>
                  <input type="password" class="form-control" id="password" name="password" value="<?php echo $getData['password']; ?>" readonly>
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
          <button type="reset" class="btn btn-secondary rounded-0 shadow-none" onclick="window.location.href='index.php'">Close</button>

          </form>
      </div>
      <div class="col-12 mt-3 mb-2">
        <p class="text-start"><a href="index.php" class="text-decoration-none">Back to Homepage</a> </p>
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
        text: 'You successfully updated your information!'
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
        text: 'Something went wrong!'
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
</div>