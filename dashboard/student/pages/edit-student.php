<!DOCTYPE html>
<html lang="en">

<?php
include_once('action/display-profile.php');
?>

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
                        Incharge Successfully Removed!
                        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                            <span aria-hidden='true'>&times</span>
                        </button>
                </div>";
    } else {
    }
    ?>
    <div class="card rounded-0 shadow-sm">
      <div class="card-header rounded-0">
        <h3 class="card-title text-dark"><i class="fa fa-user-edit"></i><strong> Update Your Information</strong></h3>
      </div>
      <div class="card-body">
        <?php
        require_once("../../database/db_conn.php");
        $userID = $_SESSION['UserID'] ;
        $sql = mysqli_query($conn, "SELECT * FROM registered_users WHERE UserID ='$userID'");
        while ($getData = mysqli_fetch_array($sql)) {

        ?>
          <form action=".?folder=action/&page=update-student-info" method="POST" enctype="multipart/form-data">

            <div class="profile-image">
              <img src="../assets/profile/<?php echo $image; ?>" alt="Profile Picture">
            </div>
            <div class="btn-add">
              <a href=".?page=student-add-photo" class="btn text-white rounded-0 shadow-none" id="edit">Add Photo</a>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="hidden" name="UserID" value="<?php echo $getData['UserID']; ?>">
                <label for="idnumber">ID number</label>
                <input type="text" class="form-control rounded-0 " name="IDnumber" value="<?php echo $getData['IDnumber']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="fname">First name</label>
                <input type="text" class="form-control rounded-0 " name="Firstname" value="<?php echo $getData['Firstname']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="lname">Middle name</label>
                <input type="text" class="form-control rounded-0 " name="Middlename" value="<?php echo $getData['Middlename']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="lname">Last name</label>
                <input type="text" class="form-control rounded-0 " name="Lastname" value="<?php echo $getData['Lastname']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control rounded-0 " name="email" value="<?php echo $getData['email']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                        <label for="year">Year</label>
                        <select id="year" class="form-control" name="year" required>
                            <option selected><?php echo $getData['year']; ?></option>
                            <option>1st</option>
                            <option>2nd</option>
                            <option>3rd</option>
                            <option>4th</option>
                        </select>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputState">Department</label>
                        <select id="inputState" class="form-control" name="Department" required>
                            <option selected><?php echo $getData['Department']; ?></option>
                            <option>COMPUTER STUDIES</option>
                            <option>ENGINEERING</option>
                            <option>EDUCATION</option>
                            <option>TECHNOLOGY</option>
                        </select>
                        </div>
              <div class="form-group col-md-6">
                <label for="password">Current Password</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-lock"></i></span>
                  </div>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter your current password " required>
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
          <button type="submit" id="save" class="btn text-white rounded-0 shadow-none">Save</button>
          <button type="reset" class="btn btn-secondary rounded-0 shadow-none" onclick="window.location.href='.?page=student-info'">Close</button>

          </form>
      </div>
      <div class="col-12 mt-3 mb-2">
        <p class="text-start"><a href=".?page=student-info" class="text-decoration-none">Go Back</a> </p>
      </div>
    </div>
  </div>

  <script src="js/form-validation.js"></script>


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


</body>

</html>
</div>